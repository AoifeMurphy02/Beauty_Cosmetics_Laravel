<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function appointments(){
        return view('appointments');
    }
    public function aboutUs(){

        return view('aboutUs');
    }
    public function gallery(){
        
        return view('gallery');
    }
    public function services(){
        $services = services::all();
        return view('services', ['services' => $services]);
        //return view('services');
    }

    public function staff(){
        $staff = staff::all();
        return view('staff', ['staff' => $staff]);
       // return view('staff');
    }
}

