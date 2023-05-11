<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contact = Contact::first();
        return view('admin.admin_contact', compact('contact'));
    }

    public function store(Request $request){
        $contact = Contact::first();
        if($contact){
            $contact->update([
                'name' => $request->name,
                'address' => $request->address,
                'number' => $request->number,
                'email' => $request->email,

            ]);
            return redirect('/admin/contact')->with('message', 'Contact Information updated successfully!');
        }else{
            Contact::create([
                'name' => $request->name,
                'address' => $request->address,
                'number' => $request->number,
                'email' => $request->email,

            ]);
            return redirect('/admin/contact')->with('message', 'Contact Information added successfully!');
        }

    }

}
