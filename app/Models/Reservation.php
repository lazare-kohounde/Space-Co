<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $fillable = [
        'status',
        'total_amount',
        'reservation_date',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detailReservations()
    {
        return $this->hasMany(DetailReservation::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    // Accessor to calculate total amount dynamically if needed
    public function getTotalAmountAttribute($value)
    {
        if ($value !== null) {
            return $value;
        }
        return $this->detailReservations()->sum('price');
    }
}
