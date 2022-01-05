<?php

namespace App\Http\Controllers\Utils;
use App\Http\Controllers\Controller;

class UtilsController extends Controller {

    public function index() {
        return view('utils.home');
    }

}