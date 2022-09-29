<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function search(Request $request, $id)
    {
        $user = User::find($id);
        $query = '';
        if($request->has('q')){
            $query = $request->q;
        }

        $invoices = Invoice::where('user_id', $id);
        $invoices = $invoices->where(function($q) use($query){
                        $q->where('service_type', 'LIKE', '%'.$query.'%');
                        $q->orWhere('merchant_id', 'LIKE', '%'.$query.'%');
                        $q->orWhere('bill_no', 'LIKE', '%'.$query.'%');
                        $q->orWhere('payment_type', 'LIKE', '%'.$query.'%');
                        $q->orWhere('amount', 'LIKE', '%'.$query.'%');
                        $q->orWhere('date', 'LIKE', '%'.$query.'%');
                        $q->orWhere('status', 'LIKE', '%'.$query.'%');
                    })->paginate(10);

        return view('admin.user.invoice', compact('user', 'invoices'));
    }

    public function create($user_id)
    {
        $user = User::find($user_id);
        return view('admin.invoice.create', compact('user'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'card_unique_id' => 'required',
            'service_type' => 'required',
            'bill_no' => 'required',
            'payment_type' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'merchant_id' => 'required',
            'status' => 'required',
        ]);
        // dd($request->all());

        $card = Card::where('card_unique_id', $request->card_id)->first();

        // Invoice::create($data);
        Invoice::creator($request, $card);

        return redirect()->back()->with('success', 'Invoice created successfully');
    }

    public function show($id)
    {
        $cards = Card::active()->get();
        $invoice = Invoice::find($id);
        return view('admin.invoice.show', compact('invoice', 'cards'));
    }

    public function edit($id)
    {
        $invoice = Invoice::find($id);
        return view('admin.invoice.edit', compact('invoice'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'card_id' => 'required',
            'service_type' => 'required',
            'bill_no' => 'required',
            'payment_type' => 'required',
            'amount' => 'required',
            'date' => 'required', 
            'merchant_id' => 'required',
            'status' => 'required',
        ]);
        // dd($request->card_id);
        $invoice = Invoice::find($id);
        $card = Card::where('card_unique_id', $request->card_id)->first();

        $data = [
            'user_id' => $request->user_id,
            'card_id' => $card->id,  
            'service_type' => $request->service_type, 
            'bill_no' => $request->bill_no, 
            'payment_type' => $request->payment_type, 
            'amount' => $request->amount,
            'date' => $request->date,
            'merchant_id' => $request->merchant_id, 
            'note' => $request->note, 
            'status' => $request->status, 
        ];

        $invoice->update($data);

        return redirect()->back()->with('success', 'Invoice update successfully');
    }

    public function destroy($id)
    {
        $invoice = Invoice::find($id);
        $invoice->delete();

        return redirect()->to(route('admin.user.invoice', $invoice->user_id))->with('success', 'Invoice deleted successfully');
    }
}
