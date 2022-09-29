<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function login()
    {
        return view('auth.login');
    }

    public function checkuser(Request $request)
    {
        // $validator = $request->validate([
        //     'phone' => 'required|regex:/^([0-9\-\+\(\)]*)$/|min:10|max:15',
        // ]);


        $user = User::where('phone', $request->get('phone'))->first();
        // dd($user);
        // if ($validator->fails())
        // {
        //     return response()->json([
        //         'success' => false,
        //         'errors' => $validator->errors()
        //     ]);
        // }

        // return response()->json(array('success' => true), 200);

        if($user == null || $request->get('phone') != $user->phone) {
            // return redirect()->back()->with('errors', 'Phone not match in our systen!');
            return response()->json([
                'success' => false,
                'message' => 'Phone not match in our systen!',
            ]);
        } else {
            return response()->json([
                'success' => true,
            ]);
        }   
    }

    public function verifyotp(Request $request)
    {
        // dd($request->phone);
        $phone = $request->phone;
        // dd($phone);
        return view('auth.verifyotp', compact('phone'));
    }  

    public function postLogin(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'phone' => 'required',
        ]);
        
        // if ($validator->fails()) {
        //     $request->session()->flash('message', 'Email Does Not Exists');
        // }
        // $credentials = $request->only('phone', 'password');
        $user = User::where('phone', $request->get('phone'))->first();

        // dd($user);
        // Check Condition Mobile No. Found or Not
        // if(isset($user))
        if($user == null || $request->get('phone') != $user->phone) {
            // \Session::put('errors', 'Your phone number not match in our system..!!');
            return redirect()->back()->with('errors', 'Phone not match in our systen!');

        }
        // }        

        \Auth::login($user);
        $user->update(['is_verified' => 1]);

        return redirect()->intended(route('user.dashboard'))->withSuccess('You have Successfully loggedin!');

        // return redirect()->route('home');

        // if (Auth::attempt($credentials)) {
        // return redirect()->intended('admin/user')->withSuccess('You have Successfully loggedin');
        // }
  
        // return redirect("admin/login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function logout(Request $request) {

        // dd('working');
        Auth::user()->update(['is_verified' => 0]);
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
