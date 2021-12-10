<?php

namespace App\CPU;

use App\Model\Category;
use App\Model\Product;

class CategoryManager
{
    public static function parents()
    {
        $x = Category::with(['childes'])->where(['position'=> 0])->get();
        // echo "<prev>";
        // var_dump($x);
        // echo "</prev>";
        return $x;
    }

    public static function child($parent_id)
    {
        // echo "cal CategoryManager child 2";
        $x = Category::where(['parent_id' => $parent_id])->get();
        return $x;
    }

    public static function products($category_id)
    {
        // echo "cal CategoryManager products 3";
        $products = Product::active()->get();
        $product_ids = [];
        foreach ($products as $product) {
            foreach (json_decode($product['category_ids'], true) as $category) {
                if ($category['id'] == $category_id) {
                    array_push($product_ids, $product['id']);
                }
            }
        }
        return Product::whereIn('id', $product_ids)->get();
    }
}
