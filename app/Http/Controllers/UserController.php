<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereNull('approved_at')->get();

        return view('users', compact('users'));
    }

    public function approve($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->update(['approved_at' => now()]);

        return redirect()->route('admin.users.index')->with('success_message', 'Request Approved successfully');
    }

    public function delete_requests($id){
        $user = User::findOrFail($id);
        $user->delete();

    return redirect()->route('admin.users.index')->with('delete_message', 'Request Deleted!');
    }
}
