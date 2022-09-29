<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('admin.auth.register');
    }

    public function postRegister(Request $request)
    {  
        // dd($request->all());
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|regex:/^([0-9\-\+\(\)]*)$/|min:10|max:15|unique:users',
            'password' => 'required|min:6',
            'account_no' => 'required',
            'provider' => 'required',
        ]);
           
        // $data = $request->all();

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'account_no' => $request->account_no,
            'provider' => $request->provider,
          ]);

        // dd('working');
        // $check = $this->create($data);
         
        return redirect(route('admin.login'))->withSuccess('Great! You have Successfully registered!');
    }

    // public function create(array $data)
    // {
    //   return 
    // }
}
