<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'description',
        'events_id',
    ];

    public function event()
    {
        return $this->belongsTo(Events::class);
    }

    public function equipments()
    {
        return $this->hasMany(Equipments::class);
    }
}
