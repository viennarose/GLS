<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class Admin_ProfileController extends Controller
{
    public function index(){

        return view('admin.admin_profile');
    }
}
