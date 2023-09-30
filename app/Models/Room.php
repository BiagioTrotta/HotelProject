<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero',
        'tipo',
        'prezzo',
        'descrizione',
    ];

    public function augustDays()
    {
        return $this->hasMany(August_day::class, 'room_id');
    }
}
