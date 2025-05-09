<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail_reservations extends Model
{
    //
    protected $fillable = [
        'reservation_id',
        'room_id',
        'start_date',
        'end_date',
        'price',
        'option',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
