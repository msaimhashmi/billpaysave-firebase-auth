<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'card_unique_id', 'name_on_card', 'card_no', 'exp_month', 'exp_year', 'cvv_no', 'status'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function setNameOnCardAttribute($value)
    {
        $this->attributes['name_on_card'] = Crypt::encryptString($value);
    }

    public function setCardNoAttribute($value)
    {
        $this->attributes['card_no'] = Crypt::encryptString($value);
    }

    public function setexpMonthAttribute($value)
    {
        $this->attributes['exp_month'] = Crypt::encryptString($value);
    }

    public function setexpYearAttribute($value)
    {
        $this->attributes['exp_year'] = Crypt::encryptString($value);
    }

    public function setCvvNoAttribute($value)
    {
        $this->attributes['cvv_no'] = Crypt::encryptString($value);
    }

    public function getNameOnCardAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (\Exception $e) {
            return $value;
        }
    }

    public function getCardNoAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (\Exception $e) {
            return $value;
        }
    }

    public function getExpMonthAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (\Exception $e) {
            return $value;
        }
    }

    public function getExpYearAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (\Exception $e) {
            return $value;
        }
    }

    public function getCvvNoAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (\Exception $e) {
            return $value;
        }
    }

}
