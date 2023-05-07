<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class Admin_HomeController extends Controller
{
    public function index(){

            $pending_requests = DB::table('users')->where('approved_at', '=', null)->count();
            $users = DB::table('users')->where('approved_at', '!=', null)->count();
            $files = DB::table('files')->count();
            $resources = DB::table('resources')->count();

        return view('admin.admin_home', compact('pending_requests', 'users', 'files', 'resources'));
    }
}
