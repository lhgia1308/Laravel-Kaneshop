<?php

namespace App\Http\Controllers\Admin;

use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Amirami\Localizator\Contracts\Translatable;
use Svg\Tag\Image;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where(['position' => 0])->latest()->paginate(25);
        return view('admin-views.category.view', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required'
        ], [
            'name.required' => 'Category name is required!',
            'image.required' => 'Category image is required!',
        ]);

        $new_category_id = DB::table('categories')->max('id') + 1;
        $category = new Category;
        $category->id = $new_category_id;
        $category->name = $request->name[array_search('en', $request->lang)];
        $category->slug = Str::slug($request->name[array_search('en', $request->lang)]);
        $category->icon = ImageManager::upload('category/', 'png', $request->file('image'));
        $category->parent_id = 0;
        $category->position = 0;
        $category->save();

        $data = [];
        $new_id = DB::table('translations')->max('id') + 1;
        foreach ($request->lang as $index => $key) {
            if ($request->name[$index] && $key != 'en') {
                array_push($data, array(
                    'id' => $new_id++,
                    'translationable_type' => 'App\Model\Category',
                    'translationable_id' => $new_category_id,
                    'locale' => $key,
                    'key' => 'name',
                    'value' => $request->name[$index],
                ));
            }
        }
        if (count($data)) {
            Translation::insert($data);
        }

        Toastr::success('Category added successfully!');
        return back();
    }

    public function edit(Request $request, $id)
    {
        $category = category::withoutGlobalScopes()->with('translations')->find($id);
        return view('admin-views.category.category-edit', compact('category'));
    }

    public function update(Request $request)
    {
        $category = Category::find($request->id);
        // var_dump($request->lang);
        // return;
        $category->name = $request->name[array_search('en', $request->lang)];
        $category->slug = Str::slug($request->name[array_search('en', $request->lang)]);
        if ($request->image) {
            $category->icon = ImageManager::update('category/', $category->icon, 'png', $request->file('image'));
        }
        $category->save();

        $data = [];
        $new_id = DB::table('translations')->max('id') + 1;
        foreach ($request->lang as $index => $key) {
            if ($request->name[$index] && $key != 'en') {
                $trans_obj = Translation::where(['translationable_type' => 'App\Model\Category', 'translationable_id' => $request->id, 'locale' => $key, 'key' => 'name'])->first();
                if(isset($trans_obj)) {
                    Translation::updateOrInsert(
                        [
                            'translationable_type' => 'App\Model\Category',
                            'translationable_id' => $category->id,
                            'locale' => $key,
                            'key' => 'name'
                        ],
                        ['value' => $request->name[$index]]
                    );
                }
                else {
                    array_push($data, array(
                        'id' => $new_id++,
                        'translationable_type' => 'App\Model\Category',
                        'translationable_id' => $request->id,
                        'locale' => $key,
                        'key' => 'name',
                        'value' => $request->name[$index],
                    ));
                }
            }
        }
        if (count($data)) {
            Translation::insert($data);
        }

        Toastr::success('Category updated successfully!');
        return back();
    }

    public function delete(Request $request)
    {
        $categories = Category::where('parent_id', $request->id)->get();
        if (!empty($categories)) {
            foreach ($categories as $category) {
                $categories1 = Category::where('parent_id', $category->id)->get();
                if (!empty($categories1)) {
                    foreach ($categories1 as $category1) {
                        Category::destroy($category1->id);
                    }
                }
                Category::destroy($category->id);
            }
        }
        //Delete image
        $cat = Category::where('id', $request->id)->first();
        ImageManager::delete('category/'.$cat->icon);
        //Delete category
        Category::destroy($request->id);
        //Delete translation
        Translation::where(['translationable_type' => 'App\Model\Category', 'translationable_id' => $request->id])->delete();
        return response()->json();
    }

    public function fetch(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::where('position', 0)->orderBy('id', 'desc')->get();
            return response()->json($data);
        }
    }

    public function status(Request $request)
    {
        $category = Category::find($request->id);
        $category->home_status = $request->home_status;
        $category->save();
        Toastr::success('Service status updated!');
        return back();
    }
}
