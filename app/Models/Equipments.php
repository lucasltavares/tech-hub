<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipments extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'provider',
        'model',
        'serial_number',
        'status',
        'type',
    ];

    public function Customers()
    {
        return $this->belongsToMany(Customers::class);
    }

    public function Rooms()
    {
        return $this->belongsTo(Rooms::class);
    }
}
