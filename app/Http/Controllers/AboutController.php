<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function index(){
        $about = About::first();
        return view('admin.admin_about', compact('about'));
    }

    public function store(Request $request){
        $about = About::first();
        if($about){
            $about->update([
                'title' => $request->title,
                'about' => $request->about,

            ]);
            return redirect('/admin/about')->with('message', 'about Updated Successfully!');
        }else{
            About::create([
                'title' => $request->title,
                'about' => $request->about,

            ]);
            return redirect('/admin/about')->with('message', 'About Added Successfully!');
        }

    }
}
