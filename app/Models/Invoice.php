<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'card_id', 'service_type', 'bill_no', 'payment_type', 'amount', 'date', 'status', 'merchant_id', 'note'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }


    public static function creator($request, $card)
    {
        $data = [
            'user_id' => ($request->user_id == null) ? Auth::user()->id : $request->user_id, 
            'card_id' => $card->id, 
            'service_type' => $request->service_type, 
            'bill_no' => $request->bill_no, 
            'payment_type' => $request->payment_type, 
            'amount' => $request->amount, 
            'date' => $request->date, 
            'merchant_id' => $request->merchant_id, 
            'note' => $request->note, 
            'status' => ($request->user_id == null) ? 'pending' : $request->status, 
        ];

        $invoice = Invoice::create($data);
        return $invoice;
    }

    // protected function status(): Attribute
    // {
    //     dd($this->status);
    //     return Attribute::make(
    //         get: fn () => ucfirst($this->status),
    //     );
    // }


    // public function getStatusAttribute($value)
    // {
    //     return ucfirst($value);
    // }

}
