<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'reservation_id',
        'author',
        'amount_paid',
        'status',
        'payment_date',
        'payment_method',
        'transaction_id', // 👈 ajoute ceci
    ];
    

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
