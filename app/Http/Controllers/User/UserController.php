<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Invoice;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function dashboard(Request $request)
    {
        $userid = Auth::user()->id;
        // dd($userid);
        // $user = User::findOrFail($userid);
        $cardno = Card::where('user_id', $userid)->pluck('card_no')->first();
        $card = substr($cardno, -4);

        // dd($card);
        $invoices = Invoice::where('user_id', $userid)->orderByDesc('id');

        $filters = [];
        
        $query = '';
        if($request->has('q') && !empty($request->q)){
            $query = $request->q;

            // $invoices = Invoice::where('user_id', $userid);
            $invoices = $invoices->where(function($q) use($query){
                            $q->where('service_type', 'LIKE', '%'.$query.'%');
                            $q->orWhere('merchant_id', 'LIKE', '%'.$query.'%');
                            $q->orWhere('bill_no', 'LIKE', '%'.$query.'%');
                            $q->orWhere('payment_type', 'LIKE', '%'.$query.'%');
                            $q->orWhere('amount', 'LIKE', '%'.$query.'%');
                            $q->orWhere('date', 'LIKE', '%'.$query.'%');
                            $q->orWhere('status', 'LIKE', '%'.$query.'%');
                        });
            $filters['search'] = $request->search;

        }

        if ($request->has('sort') && !empty($request->sort)) {
            if ($request->sort === 'date') {
                $invoices = $invoices->orderByDesc('date');
            } elseif ($request->sort === 'amount') {
                $invoices = $invoices->orderByDesc('amount');
            } 

            $filters['sort'] = $request->sort;
        }

        $invoices = $invoices->paginate(10);
        $applied_filters = $filters;

        return view('user.dashboard', compact('invoices', 'card', 'applied_filters'));
    }

    public function createInvoice(Request $request)
    {
        $validated = $request->validate([
            'card_id' => 'required',
            'service_type' => 'required',
            'bill_no' => 'required',
            'payment_type' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'merchant_id' => 'required',
        ]);

        $userid = Auth::user()->id;
        $card = Card::where('user_id', $userid)->first();
        Invoice::creator($request, $card);

        return redirect()->back()->with('success', 'Invoice created successfully');
    }

}
