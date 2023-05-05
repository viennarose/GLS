<?php

namespace App\Http\Controllers;


use App\Models\Resource;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function index(){
        $resources = Resource::all();
        return view('admin.admin_resources', compact('resources'));
    }
}
