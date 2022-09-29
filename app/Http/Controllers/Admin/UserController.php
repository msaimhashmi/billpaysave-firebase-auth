<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users = User::paginate(2);

        return view('admin.user.index', compact('users'));
    }

    public function search(Request $request)
    {
        $query = '';
        if($request->has('q')){
            $query = $request->q;
        }

        $users = User::where(function($q) use($query){
                        $q->where('first_name', 'LIKE', '%'.$query.'%');
                        $q->orWhere('last_name', 'LIKE', '%'.$query.'%');
                        $q->orWhere('email', 'LIKE', '%'.$query.'%');
                        $q->orWhere('phone', 'LIKE', '%'.$query.'%');
                        $q->orWhere('account_no', 'LIKE', '%'.$query.'%');
                        $q->orWhere('provider', 'LIKE', '%'.$query.'%');
                        $q->orWhere('dob', 'LIKE', '%'.$query.'%');
                        $q->orWhere('service_address', 'LIKE', '%'.$query.'%');
                    })->paginate(10);

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'account_no' => 'required',
            'provider' => 'required',
        ]);
        // dd($request->all());

        $data = [
            'first_name' => $request->first_name, 
            'last_name' => $request->last_name, 
            'email' => $request->email, 
            'phone' => $request->phone, 
            'account_no' => $request->account_no, 
            'provider' => $request->provider, 
            'dob' => $request->dob, 
            'service_address' => $request->service_address, 
        ];

        User::create($data);

        return redirect()->back()->with('success', 'user created successfully');
    }

    public function invoice($id)
    {
        $user = User::find($id);
        $invoices = Invoice::where('user_id', $id)->paginate(10);
        return view('admin.user.invoice', compact('user', 'invoices'));
    }

    public function card($id)
    {
        $user = User::find($id);
        $cards = Card::where('user_id', $id)->paginate(10);
        return view('admin.user.card', compact('user', 'cards'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'account_no' => 'required',
            'provider' => 'required',
        ]);
        // dd($request->all());
        $user = User::find($id);

        $data = [
            'first_name' => $request->first_name, 
            'last_name' => $request->last_name, 
            'email' => $request->email, 
            'phone' => $request->phone, 
            'account_no' => $request->account_no, 
            'provider' => $request->provider, 
            'dob' => $request->dob, 
            'service_address' => $request->service_address, 
        ];

        $user->update($data);

        return redirect()->back()->with('success', 'user update successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->to(route('admin.user.index'))->with('success', 'user deleted successfully');
    }
}
