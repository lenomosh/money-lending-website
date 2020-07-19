<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('index');
    }
    public function about(){
        return view('about');
    }
    public function services(){
        return view('services');
    }
    public function grant(){
        return view('grant');
    }
    public function contact(){
        return view('contact');
    }
    public function signup(){
        return view('signup');
    }
    public function regcom(){
        return view('regcom');
    }
    public function initiate(){
        return view('initiate');
    }
    public function homepage(){
        return view('index');
    }
}
