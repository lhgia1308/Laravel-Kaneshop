<?php

namespace App\Http\Controllers\Admin;

use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\BusinessSetting;
use App\Model\SocialMedia;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use RecursiveIteratorIterator;
use Symfony\Component\Finder\Iterator\RecursiveDirectoryIterator;

class BusinessSettingsController extends Controller
{
    public function index()
    {
        return view('admin-views.business-settings.general-settings');
    }

    public function about_us()
    {
        $about_us = BusinessSetting::where('type', 'about_us')->first();
        return view('admin-views.business-settings.about-us', [
            'about_us' => $about_us,
        ]);

    }

    public function about_usUpdate(Request $data)
    {
        $validatedData = $data->validate([
            'about_us' => 'required',
        ]);
        BusinessSetting::where('type', 'about_us')->update(['value' => $data->about_us]);
        Toastr::success('About Us updated successfully!');
        return back();
    }

    public function currency_symbol_position($side)
    {
        $currency_symbol_position = BusinessSetting::where('type', 'currency_symbol_position')->first();
        if (isset($currency_symbol_position) == false) {
            $obj = BusinessSetting::orderBy('id', 'desc')->first();
            $new_id = isset($obj) ? $obj->id + 1 : 1;
            DB::table('business_settings')->insert([
                'id' => $new_id,
                'type' => 'currency_symbol_position',
                'value' => $side,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            DB::table('business_settings')->where(['type' => 'currency_symbol_position'])->update([
                'type' => 'currency_symbol_position',
                'value' => $side,
                'updated_at' => now(),
            ]);
        }
        return response()->json(['message' => 'Symbol position is ' . $side]);
    }

    // Social Media
    public function social_media()
    {
        // $about_us = BusinessSetting::where('type', 'about_us')->first();
        return view('admin-views.business-settings.social-media');
    }

    public function fetch(Request $request)
    {
        if ($request->ajax()) {
            $data = SocialMedia::where('status', 1)->orderBy('id', 'desc')->get();
            return response()->json($data);
        }
    }

    public function social_media_store(Request $request)
    {
        $check = SocialMedia::where('name', $request->name)->first();
        if ($check != null) {
            return response()->json([
                'error' => 1,
            ]);
        }
        if ($request->name == 'google-plus') {
            $icon = 'fa fa-google-plus-square';
        }
        if ($request->name == 'facebook') {
            $icon = 'fa fa-facebook';
        }
        if ($request->name == 'twitter') {
            $icon = 'fa fa-twitter';
        }
        if ($request->name == 'pinterest') {
            $icon = 'fa fa-pinterest';
        }
        if ($request->name == 'instagram') {
            $icon = 'fa fa-instagram';
        }
        if ($request->name == 'linkedin') {
            $icon = 'fa fa-linkedin';
        }
        $social_media = new SocialMedia;
        $social_media->name = $request->name;
        $social_media->link = $request->link;
        $social_media->icon = $icon;
        $social_media->save();
        return response()->json([
            'success' => 1,
        ]);
    }

    public function social_media_edit(Request $request)
    {
        $data = SocialMedia::where('id', $request->id)->first();
        return response()->json($data);
    }

    public function social_media_update(Request $request)
    {
        $social_media = SocialMedia::find($request->id);
        $social_media->name = $request->name;
        $social_media->link = $request->link;
        $social_media->save();
        return response()->json();
    }

    public function social_media_delete(Request $request)
    {

        try {
            $br = SocialMedia::find($request->id);
            $br->delete();
        } catch (Exception $e) {

        }

        Toastr::success('Removed successfully!');
        // return back();
        return response()->json();
    }

    public function social_media_status_update(Request $request)
    {
        SocialMedia::where(['id' => $request['id']])->update([
            'active_status' => $request['status'],
        ]);
        return response()->json([
            'success' => 1,
        ], 200);
    }

    public function terms_condition()
    {
        $terms_condition = BusinessSetting::where('type', 'terms_condition')->first();
        return view('admin-views.business-settings.terms-condition', compact('terms_condition'));
    }

    public function updateTermsCondition(Request $data)
    {
        $validatedData = $data->validate([
            'value' => 'required',
        ]);
        BusinessSetting::where('type', 'terms_condition')->update(['value' => $data->value]);
        Toastr::success('Terms and Condition Updated successfully!');
        return redirect()->back();
    }

    public function privacy_policy()
    {
        $privacy_policy = BusinessSetting::where('type', 'privacy_policy')->first();
        return view('admin-views.business-settings.privacy-policy', compact('privacy_policy'));
    }

    public function privacy_policy_update(Request $data)
    {
        $validatedData = $data->validate([
            'value' => 'required',
        ]);
        BusinessSetting::where('type', 'privacy_policy')->update(['value' => $data->value]);
        Toastr::success('Privacy policy Updated successfully!');
        return redirect()->back();
    }

    public function companyInfo()
    {
        $company_name = BusinessSetting::where('type', 'company_name')->first();
        $company_email = BusinessSetting::where('type', 'company_email')->first();
        $company_phone = BusinessSetting::where('type', 'company_phone')->first();
        return view('admin-views.business-settings.website-info', [
            'company_name' => $company_name,
            'company_email' => $company_email,
            'company_phone' => $company_phone,
        ]);
    }

    public function updateCompany(Request $data)
    {
        $validatedData = $data->validate([
            'company_name' => 'required',
        ]);
        BusinessSetting::where('type', 'company_name')->update(['value' => $data->company_name]);
        Toastr::success('Company Updated successfully!');
        return redirect()->back();
    }

    public function updateCompanyEmail(Request $data)
    {
        $validatedData = $data->validate([
            'company_email' => 'required',
        ]);
        BusinessSetting::where('type', 'company_email')->update(['value' => $data->company_email]);
        Toastr::success('Company Email Updated successfully!');
        return redirect()->back();
    }

    public function updateCompanyCopyRight(Request $data)
    {
        $validatedData = $data->validate([
            'company_copyright_text' => 'required',
        ]);
        BusinessSetting::where('type', 'company_copyright_text')->update(['value' => $data->company_copyright_text]);
        Toastr::success('Company Copy Right Updated successfully!');
        return redirect()->back();
    }

    public function shop_banner(Request $request)
    {
        $img = BusinessSetting::where(['type' => 'shop_banner'])->first();
        if (isset($img)) {
            $img = ImageManager::update('shop/', $img, 'png', $request->file('image'));
            BusinessSetting::where(['type' => 'shop_banner'])->update([
                'value' => $img,
            ]);
        } else {
            $img = ImageManager::upload('shop/', 'png', $request->file('image'));
            $obj = BusinessSetting::orderBy('id', 'desc')->first();
            $new_id = isset($obj) ? $obj->id + 1 : 1;
            DB::table('business_settings')->insert([
                'id' => $new_id,
                'type' => 'shop_banner',
                'value' => $img,
            ]);
        }
        return back();
    }

    public function update(Request $request, $name)
    {

        if ($name == 'download_app_apple_stroe') {
            $download_app_store = BusinessSetting::where('type', 'download_app_apple_stroe')->first();
            if (isset($download_app_store) == false) {
                $obj = BusinessSetting::orderBy('id', 'desc')->first();
                $new_id = isset($obj) ? $obj->id + 1 : 1;
                DB::table('business_settings')->insert([
                    'id' => $new_id,
                    'type' => 'download_app_apple_stroe',
                    'value' => json_encode([
                        'status' => 1,
                        'link' => '',

                    ]),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                DB::table('business_settings')->where(['type' => 'download_app_apple_stroe'])->update([
                    'type' => 'download_app_apple_stroe',
                    'value' => json_encode([
                        'status' => $request['status'],
                        'link' => $request['link'],

                    ]),
                    'updated_at' => now(),
                ]);
            }
        } elseif ($name == 'download_app_google_stroe') {
            $download_app_store = BusinessSetting::where('type', 'download_app_google_stroe')->first();
            if (isset($download_app_store) == false) {
                $obj = BusinessSetting::orderBy('id', 'desc')->first();
                $new_id = isset($obj) ? $obj->id + 1 : 1;
                DB::table('business_settings')->insert([
                    'id' => $new_id,
                    'type' => 'download_app_google_stroe',
                    'value' => json_encode([
                        'status' => 1,
                        'link' => '',

                    ]),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                DB::table('business_settings')->where(['type' => 'download_app_google_stroe'])->update([
                    'type' => 'download_app_google_stroe',
                    'value' => json_encode([
                        'status' => $request['status'],
                        'link' => $request['link'],

                    ]),
                    'updated_at' => now(),
                ]);
            }
        }
        Toastr::success('App Store Updated successfully');

        return back();
    }

    public function updateCompanyPhone(Request $data)
    {
        $validatedData = $data->validate([
            'company_phone' => 'required',
        ]);
        BusinessSetting::where('type', 'company_phone')->update(['value' => $data->company_phone]);
        Toastr::success('Company Phone Updated successfully!');
        return redirect()->back();
    }

    public function uploadWebLogo(Request $data)
    {
        $img = BusinessSetting::where(['type' => 'company_web_logo'])->pluck('value')[0];
        if ($data->image) {
            $img = ImageManager::update('company/', $img, 'png', $data->file('image'));
        }

        BusinessSetting::where(['type' => 'company_web_logo'])->update([
            'value' => $img,
        ]);
        return back();
    }

    public function uploadFooterLog(Request $data)
    {
        $img = BusinessSetting::where(['type' => 'company_footer_logo'])->pluck('value')[0];
        if ($data->image) {
            $img = ImageManager::update('company/', $img, 'png', $data->file('image'));
        }

        BusinessSetting::where(['type' => 'company_footer_logo'])->update([
            'value' => $img,
        ]);
        Toastr::success('Footer Logo updated successfully!');
        return back();

    }

    public function uploadFavIcon(Request $data)
    {
        $img = BusinessSetting::where(['type' => 'company_fav_icon'])->pluck('value')[0];

        if ($data->image) {
            $img = ImageManager::update('company/', $img, 'png', $data->file('image'));
        }

        BusinessSetting::where(['type' => 'company_fav_icon'])->update([
            'value' => $img,
        ]);
        Toastr::success('Fav Icon updated successfully!');
        return back();

    }

    public function uploadMobileLogo(Request $data)
    {
        $img = BusinessSetting::where(['type' => 'company_mobile_logo'])->pluck('value')[0];
        if ($data->image) {
            $img = ImageManager::update('company/', $img, 'png', $data->file('image'));
        }
        BusinessSetting::where(['type' => 'company_mobile_logo'])->update([
            'value' => $img,
        ]);
        return back();
    }

    public function update_colors(Request $request)
    {
        $colors = BusinessSetting::where('type', 'colors')->first();
        if (isset($colors)) {
            BusinessSetting::where('type', 'colors')->update([
                'value' => json_encode(
                    [
                        'primary' => $request['primary'],
                        'secondary' => $request['secondary'],
                    ]),
            ]);
        } else {
            $obj = BusinessSetting::orderBy('id', 'desc')->first();
            $new_id = isset($obj) ? $obj->id + 1 : 1;
            DB::table('business_settings')->insert([
                'id' => $new_id,
                'type' => 'colors',
                'value' => json_encode(
                    [
                        'primary' => $request['primary'],
                        'secondary' => $request['secondary'],
                    ]),
            ]);
        }
        Toastr::success('Color  updated!');
        return back();
    }
    public function update_font(Request $request)
    {
        $font = BusinessSetting::where('type', 'font')->first();
        if (isset($font)) {
            BusinessSetting::where('type', 'font')->update([
                'value' => json_encode(
                    [
                        'font' => $request['font'],
                        'font_size' => $request['font_size'],
                    ]),
            ]);
        } else {
            $obj = BusinessSetting::orderBy('id', 'desc')->first();
            $new_id = isset($obj) ? $obj->id + 1 : 1;
            DB::table('business_settings')->insert([
                'id' => $new_id,
                'type' => 'font',
                'value' => json_encode(
                    [
                        'font' => $request['font'],
                        'font_size' => $request['font_size'],
                    ]),
            ]);
        }
        Toastr::success('Font  updated!');
        return back();
    }

    public function update_default_statistic_type(Request $request) {
        // var_dump($request['sel_statistic_type']);
        $statistic = BusinessSetting::where('type', 'default_statistic_type')->first();
        if(isset($statistic)) {
            BusinessSetting::where('type', 'default_statistic_type')->update([
                'value' => $request['sel_statistic_type']
            ]);
        }
        else {
            $obj = BusinessSetting::orderBy('id', 'desc')->first();
            $new_id = isset($obj) ? $obj->id + 1 : 1;
            DB::table('business_settings')->insert([
                'id' => $new_id,
                'type' => 'default_statistic_type'
                ,'value' => $request['sel_statistic_type']
            ]);
        }
        Toastr::success('Statistic Type Updated!');
        return back();
    }

    public function fcm_index()
    {
        return view('admin-views.business-settings.fcm-index');
    }

    public function update_fcm(Request $request)
    {
        DB::table('business_settings')->updateOrInsert(['type' => 'fcm_project_id'], [
            'value' => $request['fcm_project_id'],
        ]);

        DB::table('business_settings')->updateOrInsert(['type' => 'push_notification_key'], [
            'value' => $request['push_notification_key'],
        ]);

        Toastr::success('Settings updated!');
        return back();
    }

    public function update_fcm_messages(Request $request)
    {
        DB::table('business_settings')->updateOrInsert(['type' => 'order_pending_message'], [
            'value' => json_encode([
                'status' => $request['pending_status'],
                'message' => $request['pending_message'],
            ]),
        ]);

        DB::table('business_settings')->updateOrInsert(['type' => 'order_confirmation_msg'], [
            'value' => json_encode([
                'status' => $request['confirm_status'],
                'message' => $request['confirm_message'],
            ]),
        ]);

        DB::table('business_settings')->updateOrInsert(['type' => 'order_processing_message'], [
            'value' => json_encode([
                'status' => $request['processing_status'],
                'message' => $request['processing_message'],
            ]),
        ]);

        DB::table('business_settings')->updateOrInsert(['type' => 'out_for_delivery_message'], [
            'value' => json_encode([
                'status' => $request['out_for_delivery_status'],
                'message' => $request['out_for_delivery_message'],
            ]),
        ]);

        DB::table('business_settings')->updateOrInsert(['type' => 'order_delivered_message'], [
            'value' => json_encode([
                'status' => $request['delivered_status'],
                'message' => $request['delivered_message'],
            ]),
        ]);

        DB::table('business_settings')->updateOrInsert(['type' => 'order_returned_message'], [
            'value' => json_encode([
                'status' => $request['returned_status'],
                'message' => $request['returned_message'],
            ]),
        ]);


        DB::table('business_settings')->updateOrInsert(['type' => 'order_failed_message'], [
            'value' => json_encode([
                'status' => $request['failed_status'],
                'message' => $request['failed_message'],
            ]),
        ]);

        Toastr::success('Message updated!');
        return back();
    }

    public function seller_settings()
    {
        $sales_commission = BusinessSetting::where('type', 'sales_commission')->first();
        if (!isset($sales_commission)) {
            $obj = BusinessSetting::orderBy('id', 'desc')->first();
            $new_id = isset($obj) ? $obj->id + 1 : 1;
            DB::table('business_settings')->insert([
                'id' => $new_id,
                'type' => 'sales_commission',
                'value' => 0
            ]);
        }

        $seller_registration = BusinessSetting::where('type', 'seller_registration')->first();
        if (!isset($seller_registration)) {
            $obj = BusinessSetting::orderBy('id', 'desc')->first();
            $new_id = isset($obj) ? $obj->id + 1 : 1;
            DB::table('business_settings')->insert([
                'id' => $new_id,
                'type' => 'seller_registration', 
                'value' => 1
            ]);
        }

        return view('admin-views.business-settings.seller-settings');
    }

    public function sales_commission(Request $data)
    {
        $validatedData = $data->validate([
            'commission' => 'required|min:0',
        ]);
        $sales_commission = BusinessSetting::where('type', 'sales_commission')->first();

        if (isset($sales_commission)) {
            BusinessSetting::where('type', 'sales_commission')->update(['value' => $data->commission]);
        } else {
            $obj = BusinessSetting::orderBy('id', 'desc')->first();
            $new_id = isset($obj) ? $obj->id + 1 : 1;
            DB::table('business_settings')->insert([
                'id' => $new_id,
                'type' => 'sales_commission', 
                'value' => $data->commission
            ]);
        }

        Toastr::success('Sales commission Updated successfully!');
        return redirect()->back();
    }

    public function seller_registration(Request $data)
    {
        $seller_registration = BusinessSetting::where('type', 'seller_registration')->first();
        if (isset($seller_registration)) {
            BusinessSetting::where(['type' => 'seller_registration'])->update(['value' => $data->seller_registration]);
        } else {
            $obj = BusinessSetting::orderBy('id', 'desc')->first();
            $new_id = isset($obj) ? $obj->id + 1 : 1;
            DB::table('business_settings')->insert([
                'id' => $new_id,
                'type' => 'seller_registration',
                'value' => $data->seller_registration,
                'updated_at' => now()
            ]);
        }

        Toastr::success('Seller registration Updated successfully!');
        return redirect()->back();
    }

    public function update_language(Request $request)
    {
        $languages = $request['language'];
        if (in_array('en', $languages)) {
            unset($languages[array_search('en', $languages)]);
        }
        array_unshift($languages, 'en');

        DB::table('business_settings')->where(['type' => 'pnc_language'])->update([
            'value' => json_encode($languages),
        ]);
        Toastr::success('Language  updated!');
        return back();
    }

    public function generate_seed_files(Request $request) {
        // $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
        $names = $request['table_names'];
        // var_dump($request['chk_create_files']);
        // return;
        // $ori = include(base_path('resources/views/admin-views/business-settings/seed.blade.php'));
        // var_dump($ori);
        //Create only a new file
        if(!isset($request['chk_create_files']))
            file_put_contents(base_path('database/seeds/AllSeed.php'), '');

        //Define a global variable: $results to join data of all the tables to a string
        $results = "";
        $class_names = [];
        foreach($names as $name) {

            if(isset($request['chk_create_files']))
                file_put_contents(base_path('database/seeds/'.$name.'.php'), '');

            $class = DB::table($name)->get();
            //Define a array: $str_atr to convert to a string
            $str_atr = [];
            foreach($class as $obj) {
                // var_dump($obj);
                $obj_arr = [];
                
                foreach($obj as $key=>$value) {

                    $type = DB::getSchemaBuilder()->getColumnType($name, $key);
                    // var_dump($type);
                    
                    //Handle special chars
                    $value = addcslashes($value, "'");
                    $value = str_replace('\"', '', $value);
                    //End handle

                    $val = "'".$value."'";
                    if($type == "integer") {
                        // var_dump($value);
                        // return;
                        $val = $value==""?'NULL':$value;
                    }
                    if($type == "datetime") {
                        // var_dump(date('Y-m-d H:i:s', strtotime('2021-11-26 03:08:48.000')));
                        $val = "date('Y-m-d H:i:s', strtotime('".$value."'))";
                    }
                    
                    array_push($obj_arr, implode('=>', array("'".$key."'", $val)));
                    $data_str = implode(",", $obj_arr);

                }
                $data_str = "[" . $data_str . "]";
                //Push a string to a array
                array_push($str_atr, $data_str);
            }
            
            //Join datas of a array to a string
            $temp_str = implode(',', $str_atr);
            //End Get data of a table

            //Write data to per file
            if(isset($request['chk_create_files'])) {
                $results = '
                    DB::table("'.$name.'")->insert([
                        '.$temp_str.'
                    ]);
                ';
                $template_str = '
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class '.$name.' extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            '.$results.'
                        }
                    }
                ';
                //Write data to a PHP file
                $file = fopen('database/seeds/'.$name.'.php', "w") or die("Unable to open file!");
                fwrite($file, $template_str);
                fclose($file);
            }
            //Join data of a table to a global variable
            else {
                $results = $results .'
                    DB::table("'.$name.'")->insert([
                        '.$temp_str.'
                    ]);
                ';
                // var_dump($results);
            }
            //Write class names into $name_arr
            if(isset($request['chk_write_classes'])) {
                array_push($class_names, $name . "::class");
            }
        }
        
        //Case not create multi files, write all of datas of many tables into a file
        if(!isset($request['chk_create_files'])) {
            $template_str = '
            <?php
                use Illuminate\Database\Seeder;
                use Illuminate\Support\Facades\DB;
                
                class AllSeed extends Seeder
                {
                    /**
                     * Run the database seeds.
                     *
                     * @return void
                     */
                    public function run()
                    {
                        '.$results.'
                    }
                }
            ';
            //Write result to a PHP file
            $file = fopen('database/seeds/AllSeed.php', "w") or die("Unable to open file!");
            fwrite($file, $template_str);
            fclose($file);
        }

        //Write class names into DatabaseSeeder file
        if(isset($request['chk_write_classes'])) {
            // var_dump($name_arr);
            $results = implode(",\n", $class_names);
            $template_str = '
                <?php
                use Illuminate\Database\Seeder;

                class DatabaseSeeder extends Seeder
                {
                    public function run()
                    {
                        $this->call([
                            '.$results.'
                        ]);
                    }
                }
            ';
            //Write result to a PHP file
            $file = fopen('database/seeds/DatabaseSeeder.php', "w") or die("Unable to open file!");
            fwrite($file, $template_str);
            fclose($file);
        }
        
        return response()->json(['success'=>1, 'statusCode'=> 200, 'message' => 'Generated the seed file at folder database/seeds!'], 200);
        // Toastr::success('Generated the seed file at folder database/seeds!');
        // return back();
    }

    public function generate_migration_files(Request $request) {
        // var_dump($request['table_names']);
        // var_dump($request['chk_create_files']);
        // return;
        // Handle delete files in folder database/migrations
        $dir = base_path('database/migrations');
        $files = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);//CHILD_FIRST
        // var_dump($files);
        // return;
        // $files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
        foreach ($files as $file) {
            if ($file->isDir()) {
                // rmdir($file->getRealPath());
            } else {
                unlink($file->getRealPath());
            }
        }
        // End Handle delete files
        //Handle create a new file
        $current_datetime = date('Y_m_d_His');
        if(isset($request['chk_create_files'])) {
            
        }
        else {
            file_put_contents(base_path('database/migrations/'.$current_datetime.'_create_all_tables.php'), '');
        }
        //End Handle create a new file
        //Get table names
        $names = $request['table_names'];
        //Create the global variables
        $structure_str = "";
        $create_str = "";
        $drop_arr = [];
        foreach($names as $name) {

            if(isset($request['chk_create_files'])) {
                file_put_contents(base_path('database/migrations/'.$current_datetime.'_create_'.$name.'_table.php'), '');
            }

            $columns = Schema::getConnection()->getDoctrineSchemaManager()->listTableColumns($name);
            // $columns = DB::getSchemaBuilder()->getColumnListing($name);
            foreach ($columns as $column) {
                // $obj = DB::getSchemaBuilder()->getColumnType($name, $column);
                $col_type = str_replace("\\", "", $column->getType());
                $col_name = $column->getName();
                if($col_name == "id") {
                    $structure_str = $structure_str.'
                        $table->integer("id")->primary();
                    ';
                }
                else {
                    $str = "";
                    $length = $column->getLength();
                    switch ($col_type) {
                        case 'BigInt':
                            $str = "bigInteger('".$col_name."')";
                            break;
                        case 'SmallInt':
                            $str = "smallInteger('".$col_name."')";
                            break;
                        case 'String':
                            if($length ==0) {
                                $str = "text('".$col_name."')";
                            }
                            else {
                                $str = "string('".$col_name."', ".$length.")";
                            }
                            break;
                        default:
                            $str = $col_type."('".$col_name."')";
                            break;
                    }
                    $structure_str = $structure_str.'
                        $table->'.$str.'->nullable();
                    ';
                }
                
            }

            if(isset($request['chk_create_files'])) {
                $create_str = '
                    Schema::create('."'".$name."'".', function (Blueprint $table) {
                        '.$structure_str.'
                    });
                ';
                $drop_str = "Schema::dropIfExists('".$name."')";
                $table_name = str_replace("_", "", ucwords($name, "_"));
                $template_str = '
                    <?php

                    use Illuminate\Database\Migrations\Migration;
                    use Illuminate\Database\Schema\Blueprint;
                    use Illuminate\Support\Facades\Schema;
                    
                    class Create'.$table_name.'Table extends Migration
                    {
                        public function up() {
                            '.$create_str.'
                        }

                        public function down() {
                            '.$drop_str.';
                        }
                    }
                ';
                //Write result to a PHP file
                $file = fopen('database/migrations/'.$current_datetime.'_create_'.$name.'_table.php', "w") or die("Unable to open file!");
                fwrite($file, $template_str);
                fclose($file);
                //Reset structure_str to get structure of a new table
                $structure_str = "";
            }
            else {
                $create_str = $create_str.'
                    Schema::create('."'".$name."'".', function (Blueprint $table) {
                        '.$structure_str.'
                    });
                ';
                //Reset structure_str to get structure of a new table
                $structure_str = "";
                //Add a drop table command into a array
                array_push($drop_arr, "Schema::dropIfExists('".$name."')");
            }

        }

        //Write datas into overall files
        if(!isset($request['chk_create_files'])) {
            $template_str = '
                <?php

                use Illuminate\Database\Migrations\Migration;
                use Illuminate\Database\Schema\Blueprint;
                use Illuminate\Support\Facades\Schema;
                
                class CreateAllTables extends Migration
                {
                    public function up() {
                        '.$create_str.'
                    }

                    public function down() {
                        '.implode(";\n", $drop_arr).';
                    }
                }
            ';

            //Write result to a PHP file
            $file = fopen('database/migrations/'.$current_datetime.'_create_all_tables.php', "w") or die("Unable to open file!");
            fwrite($file, $template_str);
            fclose($file);
        }
    }
}
