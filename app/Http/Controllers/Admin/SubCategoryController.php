<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Translation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories=Category::where(['position'=>1])->latest()->paginate(25);
        return view('admin-views.category.sub-category-view',compact('categories'));
    }

    public function store(Request $request)
    {
        $new_category_id = DB::table('categories')->max('id') + 1;
        $category = new Category;
        $category->id = $new_category_id;
        $category->name = $request->name[array_search('en', $request->lang)];
        $category->slug = Str::slug($request->name[array_search('en', $request->lang)]);
        $category->parent_id = $request->parent_id;
        $category->position = 1;
        $category->save();

        $new_id = DB::table('translations')->max('id') + 1;
        foreach($request->lang as $index=>$key)
        {
            if($request->name[$index] && $key != 'en')
            {
                Translation::updateOrInsert(
                    [
                        'id' => $new_id++,
                        'translationable_type'  => 'App\Model\Category',
                        'translationable_id'    => $new_category_id,
                        'locale'                => $key,
                        'key'                   => 'name'],
                    ['value'                 => $request->name[$index]]
                );
            }
        }
        Toastr::success('Category updated successfully!');
        return back();
    }

    public function edit(Request $request)
    {
        $data = Category::where('id', $request->id)->first();

        return response()->json($data);
    }

    public function update(Request $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->parent_id = $request->parent_id;
        $category->position = 1;
        $category->save();
        return response()->json();
    }

    public function delete(Request $request)
    {
        // $categories = Category::where('parent_id', $request->id)->get();
        // if (!empty($categories)) {

        //     foreach ($categories as $category) {
        //         Category::destroy($category->id);
        //     }
        // }
        Category::destroy($request->id);
        //Delete translation
        Translation::where(['translationable_type' => 'App\Model\Category', 'translationable_id' => $request->id])->delete();
        return response()->json();
    }

    public function fetch(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::where('position', 1)->orderBy('id', 'desc')->get();
            return response()->json($data);
        }
    }
}
