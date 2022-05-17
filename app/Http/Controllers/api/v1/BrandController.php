<?php

namespace App\Http\Controllers\api\v1;

use App\CPU\BrandManager;
use App\CPU\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brand;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\CPU\ImageManager;

class BrandController extends Controller
{
    public function get_brands()
    {
        try {
            $brands = BrandManager::get_brands();
        } catch (\Exception $e) {
        }

        return response()->json($brands,200);
    }

    public function get_list()
    {
        try {
            $brands = BrandManager::get_brands();
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => $e->getMessage(), 'data' => []], 404);
        }

        return response()->json(['status' => 200, 'message' => 'success', 'data' => $brands], 200);
    }

    public function get_products($brand_id)
    {
        try {
            $products = BrandManager::get_products($brand_id);
        } catch (\Exception $e) {
            return response()->json(['success' => 0, 'errors' => $e->getMessage()], 403);
        }

        return response()->json($products,200);
    }

    public function add_new_brand2(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:brands|max:255',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['status' => 403, 'message' => Helpers::error_processor($validator), 'data' => []], 403);
            }

            if ($request->has('image')) {
                $imageName = ImageManager::update('brand/', $request->image, 'png', $request->file('image'));
            } else {
                $imageName = $request->image;
            }

            $new_id = DB::table('brands')->max('id') + 1;
            $values = [
                'id' => $new_id,
                'name' => $request->name,
                'image' => $imageName,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            DB::table('brands')->insert($values);
            return response()->json(['status' => 200, 'message' => 'successfully added!', 'data' => $values], 200);

        } catch (\Exception $e) {
            return response()->json(['status' => 403, 'message' => Helpers::error_processor($validator), 'data' => []], 403);
        }
    }

    public function add_new_brand(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:brands|max:255',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['success' => 0, 'errors' => Helpers::error_processor($validator)], 403);
            }

            if ($request->has('image')) {
                $imageName = ImageManager::update('profile/', $request->image, 'png', $request->file('image'));
            } else {
                $imageName = $request->image;
            }

            $new_id = DB::table('brands')->max('id') + 1;
            $values = [
                'id' => $new_id,
                'name' => $request->name,
                'image' => $imageName,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            DB::table('brands')->insert($values);
            return response()->json(['success' => 1, 'message' => 'successfully added!'], 200);

        } catch (\Exception $e) {
            return response()->json(['success' => 0, 'errors' => $e->getMessage()], 403);
        }
    }

    public function update_brand2(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'name' => 'required',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['status' => 403, 'message' => Helpers::error_processor($validator), 'data' => []], 403);
            }
            
            $brand = DB::table('brands')->find($request->id);
            if(isset($brand)) {
                $values = [
                    'name' => $request->name
                ];

                if ($request->file('image') != null) {
                    //Delete old image
                    $rs = ImageManager::delete('brand/' . $brand->image);
                    //Add a new image
                    $imageName = ImageManager::update('brand/', $request->image, 'png', $request->file('image'));
                    $values['image'] = $imageName;
                }

                $rs = DB::table('brands')->where('id', $request->id)->update($values);

                $brand = DB::table('brands')->find($request->id);
                return response()->json(['status' => 200, 'message' => 'successfully updated!', 'data' => $brand], 200);
            }
            else {
                return response()->json(['status' => 403, 'message' => "Brand doesn't exists", 'data' => []], 403);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => 0, 'errors' => $e->getMessage()], 403);
        }
    }

    public function update_brand(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'name' => 'required',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['success' => 0, 'errors' => Helpers::error_processor($validator)], 403);
            }
            
            $brands = DB::table('brands')->find($request->id);

            if(isset($brands)) {
                $values = [
                    'name' => $request->name
                ];
                $rs = DB::table('brands')->where('id', $request->id)->update($values);
                return response()->json(['success' => 1, 'message' => 'successfully updated!'], 200);
            }
            else {
                return response()->json(['success' => 0, 'errors' => "Brand doesn't exists"], 403);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => 0, 'errors' => $e->getMessage()], 403);
        }
    }

    public function update_status(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'ids' => 'required',
                'status' => 'required',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['status' => 403, 'message' => Helpers::error_processor($validator), 'data' => []], 403);
            }
            
            $ids = $request->ids;
            
            $datas = [];
            if(count($ids) > 0) {
                foreach ($ids as $id) {
                    $brand = DB::table('brands')->find($id);
                    if(isset($brand)) {
                        DB::table('brands')->where('id', $id)->update(['status' => $request->status]);
                        $new_brand = DB::table('brands')->find($id);
                        array_push($datas, $new_brand);
                    }
                }
            }
            return response()->json(['status' => 200, 'message' => 'successfully updated status!', 'data' => $datas], 200);

        } catch (\Exception $e) {
            return response()->json(['status' => 403, 'message' => $e->getMessage(), 'data' => []], 403);
        }
    }

    public function delete_brand2(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['status' => 403, 'message' => Helpers::error_processor($validator), 'data' => []], 403);
            }
            
            $brand = DB::table('brands')->find($request->id);

            if(isset($brand)) {
                //Delete images
                $rs = ImageManager::delete('brand/' . $brand->image);
                //Delete data from DB
                $rs = DB::table('brands')->where('id', $request->id)->delete();
                return response()->json(['status' => 200, 'message' => 'successfully deleted!', 'data' => $brand], 200);
            }
            else {
                return response()->json(['status' => 404, 'message' => "Brand doesn't exists", 'data' => []], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 403, 'message' => $e->getMessage(), 'data' => []], 403);
        }
    }

    public function delete_brand(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['success' => 0, 'errors' => Helpers::error_processor($validator)], 403);
            }
            
            $brands = DB::table('brands')->find($request->id);

            if(isset($brands)) {
                $values = [
                    'name' => $request->name
                ];
                $rs = DB::table('brands')->where('id', $request->id)->delete();
                return response()->json(['success' => 1, 'message' => 'successfully deleted!'], 200);
            }
            else {
                return response()->json(['success' => 0, 'errors' => "Brand doesn't exists"], 403);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => 0, 'errors' => $e->getMessage()], 403);
        }
    }

}
