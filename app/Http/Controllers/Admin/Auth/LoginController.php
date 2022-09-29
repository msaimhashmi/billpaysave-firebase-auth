<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Session;
use Hash;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function login()
    {
        return view('admin.auth.login');
    }

    public function checkuser(Request $request)
    {
        // $validator = $request->validate([
        //     'phone' => 'required|regex:/^([0-9\-\+\(\)]*)$/|min:10|max:15',
        // ]);


        $user = User::where('phone', $request->get('phone'))->first();

        // if ($validator->fails())
        // {
        //     return response()->json([
        //         'success' => false,
        //         'errors' => $validator->errors()
        //     ]);
        // }

        // return response()->json(array('success' => true), 200);

        // if($user == null || $request->get('phone') != $user->phone || Hash::check($request->get('password'), $user->password)) {
        if($user == null || $user->password == null || Hash::check($request->password, $user->password) == false) {
            // return redirect()->back()->with('errors', 'Phone not match in our systen!');
            return response()->json([
                'success' => false,
                'message' => 'Incorrect phone or password!',
            ]);
        }else{  
            return response()->json([
                'success' => true,
            ]);
        }
    }

    public function verifyotp(Request $request)
    {
        $phone = $request->phone;
        return view('admin.auth.verifyotp', compact('phone'));
    }  

    public function postLogin(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);
        

        $credentials = $request->only('phone', 'password');
        if(Auth::attempt($credentials))
        {
            $user->update(['is_verified' => 1]);
            return redirect()->intended(route('admin.user.index'))->withSuccess('You have Successfully loggedin');
        }
        // $user = User::where('phone', $request->get('phone'))->first();
        
        // if($user == null || $request->get('phone') != $user->phone || Hash::check($request->password, $user->password) == false)
        // {
        //     return redirect()->back()->with('errors', 'Incorrect phone or password!');
        // }
        // \Auth::login($user);
        // $user->update(['is_verified' => 1]);
        // return redirect()->intended(route('admin.user.index'))->withSuccess('You have Successfully loggedin');
        
        return redirect()->back()->with('errors', 'Oppes! You have entered invalid credentials');
    }

    public function logout(Request $request) {

        Auth::user()->update(['is_verified' => 0]);
        Session::flush();
        Auth::logout();
        return redirect('admin/login');
    }
}
