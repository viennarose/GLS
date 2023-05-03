<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class Admin_FileController extends Controller
{

    public function index(){
        $files = File::all();
        return view('admin.admin_file', compact('files'));
    }
}
