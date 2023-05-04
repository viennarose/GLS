<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin_HomeController extends Controller
{
    public function index(){
       
        return view('admin.admin_home');
    }
}
