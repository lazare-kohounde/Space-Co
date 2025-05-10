<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rooms extends Model
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
        return $this->belongsTo(Category::class);
    }

    public function detailReservations()
    {
        return $this->hasMany(DetailReservation::class);
    }
}
