<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'email',
        'phone',
    ];


    public function Events()
    {
        return $this->hasMany(Events::class);
    }

    public function Equipments()
    {
        return $this->hasMany(Equipments::class);
    }
}


