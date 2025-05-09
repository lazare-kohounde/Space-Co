<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    //
    protected $fillable = ['name', 'description'];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
