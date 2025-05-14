<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'price',
        'options',
        'availability',
        'image',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function detailReservations()
    {
        return $this->hasMany(DetailReservation::class);
    }

    // Dans app/Models/Room.php
    protected $casts = [
        'image' => 'array'
    ];

}
