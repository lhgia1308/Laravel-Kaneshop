<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\BusinessSetting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Ds\Map;
use Illuminate\Support\Facades\DB;
use App\Model\Language;
use App\CPU\ImageManager;

class AppLanguageController extends Controller
{
    public function index()
    {
        return view('admin-views.business-settings.app-language.index');
    }
    public function store(Request $request)
    {
        $language = BusinessSetting::where('type', 'app_language')->first();
        // var_dump(json_decode($language['value'], true));
        // return;
        $lang_array = [];
        foreach (json_decode($language['value'], true) as $key => $data) {
            if ($data['code'] != $request['code']) {
                array_push($lang_array, $data);
            }
        }
        
        $lang_arr = json_decode($language['value'], true);
        
        $ids = array_map(fn($lang): int => $lang['id'], $lang_arr);
        // var_dump(max($ids));
        // return;

        if (!file_exists(base_path('resources/app-lang/' . $request['code']))) {
            mkdir(base_path('resources/app-lang/' . $request['code']), 0777, true);
        }

        $lang_file = fopen(base_path('resources/app-lang/' . $request['code'] . '/' . 'messages.php'), "w") or die("Unable to open file!");
        $read = file_get_contents(base_path('resources/app-lang/en/messages.php'));
        fwrite($lang_file, $read);

        array_push($lang_array, [
            'id' => max($ids) + 1,
            'name' => $request['name'],
            'code' => $request['code'],
            'status' => 0,
        ]);

        BusinessSetting::where('type', 'app_language')->update([
            'value' => json_encode($lang_array)
        ]);

        return back();
    }
    public function update_status(Request $request)
    {
        $language = BusinessSetting::where('type', 'app_language')->first();
        $lang_array = [];
        foreach (json_decode($language['value'], true) as $key => $data) {
            if ($data['code'] == $request['code']) {
                if ($data['status'] == 1) {
                    $lang = [
                        'id' => $data['id'],
                        'name' => $data['name'],
                        'code' => $data['code'],
                        'status' => 0,
                    ];
                } else {
                    $lang = [
                        'id' => $data['id'],
                        'name' => $data['name'],
                        'code' => $data['code'],
                        'status' => 1,
                    ];
                }
                array_push($lang_array, $lang);
            } else {
                array_push($lang_array, $data);
            }
        }
        BusinessSetting::where('type', 'app_language')->update([
            'value' => json_encode($lang_array)
        ]);
    }
    public function set_default_language($lang){
        $language = BusinessSetting::where('type','app_default_language')->first();
        // var_dump($lang);
        // var_dump($language);
        // return;
        if(isset($language)){
            BusinessSetting::where('type','app_default_language')->update([
                'value' => json_encode([
                    'default_language' => $lang
                ]),
            ]);
        } else {
            $obj = BusinessSetting::orderBy('id', 'desc')->first();
            $new_id = isset($obj) ? $obj->id + 1 : 1;
            DB::table('business_settings')->insert([
                'id' => $new_id,
                'type' => 'app_default_language',
                'value' => json_encode([
                    'default_language' => $lang
                ]),
            ]);
        }
        return back();
    }
    public function delete($lang)
    {
        $language = BusinessSetting::where('type', 'app_language')->first();
        $lang_array = [];
        foreach (json_decode($language['value'], true) as $key => $data) {
            if ($data['code'] != $lang) {
                array_push($lang_array, $data);
            }
        }
        BusinessSetting::where('type', 'app_language')->update([
            'value' => json_encode($lang_array)
        ]);

        $dir = base_path('resources/app-lang/' . $lang);
        $it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
        $files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
        foreach ($files as $file) {
            if ($file->isDir()) {
                rmdir($file->getRealPath());
            } else {
                unlink($file->getRealPath());
            }
        }
        rmdir($dir);

        // Toastr::success('Removed Successfully!');
        // return back();
        return response()->json([
            'statusCode' => 200,
        ]);
    }
    public function translate($lang)
    {
        return view('admin-views.business-settings.app-language.translate', compact('lang'));
    }
    public function translate_sync(Request $request){
        $array = include(base_path('resources/app-lang/'.$request['language_sel_id'].'/messages.php'));
        $array2 = include(base_path('resources/app-lang/'.$request['language_id'].'/messages.php'));
        $sync_all_values = $request['sync_all_values'];

        if($sync_all_values == 'true'){
            $array2 = $array;
        }
        else {
            $array_key_diff = array_diff(array_keys($array), array_keys($array2));
            $array_diff=[];

            foreach($array_key_diff as $key){
                $array_diff = array_merge($array_diff, (array($key => "")));
            }

            $array2 = array_merge($array2,$array_diff);
        }

        // var_dump($array2);
        // return;
        
        $str = "<?php return " . var_export($array2, true) . ";";
        $rs = file_put_contents(base_path('resources/app-lang/' . $request['language_id'] . '/messages.php'), $str);
        if($rs){
            return response()->json([
                'statusCode' => 200,
                'amount_of_impact'=>$rs
            ]);
        }
        else{
            return response()->json([
                'statusCode' => 404,
                'amount_of_impact'=>$rs
            ]);
        }
    }
    public function translate_submit(Request $request, $lang)
    {
        $ori_array = include(base_path('resources/app-lang/'.$lang.'/messages.php'));
        $data = array_combine($request['key'], $request['value']);
        $data = array_replace($ori_array, $data);
        // var_dump($data);
        // return;
        $str = "<?php return " . var_export($data, true) . ";";
        file_put_contents(base_path('resources/app-lang/' . $lang . '/messages.php'), $str);
        Toastr::success('Translation file updated!');
        return back();
    }
    
}