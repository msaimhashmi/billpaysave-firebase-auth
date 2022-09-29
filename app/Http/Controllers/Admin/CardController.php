<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // public function search(Request $request, $id)
    // {
    //     $user = User::find($id);
    //     $query = '';
    //     if($request->has('q')){
    //         $query = $request->q;
    //     }

    //     $cards = Card::where('user_id', $id);
    //     $cards = $cards->where(function($q) use($query){
    //                     $q->where('name_on_card', 'LIKE', '%'.$query.'%');
    //                     $q->orWhere('card_no', 'LIKE', '%'.$query.'%');
    //                     $q->orWhere('exp_month', 'LIKE', '%'.$query.'%');
    //                     $q->orWhere('exp_year', 'LIKE', '%'.$query.'%');
    //                     $q->orWhere('cvv_no', 'LIKE', '%'.$query.'%');
    //                     $q->orWhere('status', 'LIKE', '%'.$query.'%');
    //                 })->paginate(10);

    //     return view('admin.user.card', compact('user', 'cards'));
    // }

    public function create($user_id)
    {
        return view('admin.card.create', compact('user_id'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_on_card' => 'required',
            'card_no' => 'required',
            'exp_month' => 'required',
            'exp_year' => 'required',
            'cvv_no' => 'required',
            'status' => 'required',
        ]);
        // dd($request->all());

        $data = [
            'card_unique_id' => rand(1,999999), 
            'user_id' => $request->user_id, 
            'name_on_card' => $request->name_on_card, 
            'card_no' => $request->card_no, 
            'exp_month' => $request->exp_month, 
            'exp_year' => $request->exp_year, 
            'cvv_no' => $request->cvv_no, 
            'status' => $request->status, 
        ];

        // dd($data);
        Card::create($data);

        return redirect()->back()->with('success', 'Card created successfully');
    }

    public function show($id)
    {
        $card = Card::find($id);
        return view('admin.card.show', compact('card'));
    }

    public function edit($id)
    {
        $card = Card::find($id);
        return view('admin.card.edit', compact('card'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name_on_card' => 'required',
            'card_no' => 'required',
            'exp_month' => 'required',
            'exp_year' => 'required',
            'cvv_no' => 'required',
            'status' => 'required',
        ]);
        // dd($request->status);
        $card = Card::find($id);

        $data = [
            'name_on_card' => $request->name_on_card, 
            'card_no' => $request->card_no, 
            'exp_month' => $request->exp_month, 
            'exp_year' => $request->exp_year,
            'cvv_no' => $request->cvv_no,
            'status' => $request->status, 
        ];

        $card->update($data);

        return redirect()->back()->with('success', 'Card update successfully');
    }

    public function destroy($id)
    {
        $card = Card::find($id);
        $card->delete();

        return redirect()->to(route('admin.user.card', $card->user_id))->with('success', 'Card deleted successfully');
    }
}
