<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;


class ProfileController extends Controller
{
    public function index(){

        return view('profile');
    }

    public function update_profile(Request $request, $id){
        $profile = User::find($id);

        $profile->name = $request->input('name');
        $profile->email = $request->input('email');

        if($request->hasFile('profile_image')){

            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'. $extention;
            $file->move('user_img/', $filename);
            $profile->profile_image = $filename;

    }

    $profile->update();
    return redirect()->back()->with('message', 'Profile Updated Successfully!');

    }
}
