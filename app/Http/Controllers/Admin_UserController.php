<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\UserApprovedNotification;
use App\Notifications\NewUser;
use Notification;


class Admin_UserController extends Controller
{
    public function index()
    {
        $users = User::whereNull('approved_at')->get();

        return view('admin.unapprovedusers', compact('users'));
    }

    public function approve($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->update(['approved_at' => now()]);

        $user->notify(new UserApprovedNotification());
        
        return redirect()->route('admin.unapproved_users')->with('success_message', 'Request approved successfully!');
    }

    public function delete_requests($id){

    if (!auth()->user()->admin) {
        return redirect()->back()->with('error', 'You do not have permission.');
    }
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->back()->with('delete_message', 'Request has been deleted!');

    }

    public function resendApprovalNotification(Request $request, $user_id)
   {
    $user = User::findOrFail($user_id);

    if ($user->approved_at) {
    return redirect()->back()->withErrors(['User has already been approved.']);
   }

    $admin_email = User::where('admin', '1')->value('email');
    Notification::send(User::where('email', $admin_email)->first(), new NewUser($user));

    return redirect()->back()->with('success', 'Approval notification has been resent to the admin.');

   }


   //For Approved Users

   public function approvedIndex(){
    $users = User::whereNotNull('approved_at')
    ->where('admin', '<>', 1)->get();

    return view('admin.approvedusers', compact('users'));
   }


   public function delete_user($id){

    if (!auth()->user()->admin) {
        return redirect()->back()->with('error', 'You do not have permission.');
    }
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->back()->with('delete_message', 'User has been deleted!');

    }
}
