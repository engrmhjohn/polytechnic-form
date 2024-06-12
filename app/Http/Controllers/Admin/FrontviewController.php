<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontviewController extends Controller
{

    public function index(){
        return view('frontend.home.index');
    }

    public function custom(){
        return view('frontend.custom.test');
    }
}
