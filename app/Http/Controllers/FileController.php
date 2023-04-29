<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index(){
        $files = File::all();
        return view('admin.file', compact('files'));
    }
}
