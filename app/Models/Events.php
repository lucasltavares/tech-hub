<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location',
        'is_active',
        'rooms',
        'user_id',
    ];

    public function rooms()
    {
        return $this->hasMany(Rooms::class);
    }

    public function equipments()
    {
        return $this->hasMany(Equipments::class);
    }

}
