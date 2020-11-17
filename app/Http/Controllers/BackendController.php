<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function index()
    {
        return view('backend.pages.dashboard');
    }

    public function blank(){
        return view('backend.pages.blank');
    }

    public function reports(){
        return 'Reports';
    }

    public function users(){
        return 'Users';
    }

    public function settings(){
        return 'Settings';
    }

    public function nopermission(){
        return view('backend.pages.nopermission');
    }

}
