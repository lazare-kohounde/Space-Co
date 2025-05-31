<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'reservation_id',
        'author', // 👈 ajoute ceci
        'amount_paid',
        'status',
        'payment_date',
        'payment_method',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
