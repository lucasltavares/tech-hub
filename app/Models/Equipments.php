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

    protected $attributes = [
        'events_id' => null
    ];

    public function Events()
    {
        return $this->belongsTo(Events::class);
    }

    public function Rooms()
    {
        return $this->belongsTo(Rooms::class);
    }
}
