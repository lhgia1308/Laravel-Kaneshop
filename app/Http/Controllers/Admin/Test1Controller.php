<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Attribute;

class Test1Controller extends Controller {
    public function index()
    {
        $attributes = Attribute::latest()->paginate(25);
        return view('admin-views.attribute.view',compact('attributes'));
    }
}