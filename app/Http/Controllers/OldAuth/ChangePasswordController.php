<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Models\User;
use Hash;

class ChangePasswordController extends Controller
{
    // public function changePassword()
    // {
    // 	return view('admin.setting.change-password');
    // }

    public function updatePassword(Request $request)
    {
    	$this->validate($request, [
    		'current_password' => ['required', new MatchOldPassword],
    		'new_password' => ['required'],
    		'confirm_password' => ['same:new_password']
    	]);

    	User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

    	return redirect()->back()->with('message', 'Password changed successfully!');
    }
}
