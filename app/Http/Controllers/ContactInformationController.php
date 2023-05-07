<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class ContactInformationController extends Controller
{
    public function index(){

        $contacts = DB::table('contacts')->get();

        return view('contact_info', compact('contacts'));
    }
}
