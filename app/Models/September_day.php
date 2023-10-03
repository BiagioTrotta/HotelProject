<?php

namespace App\Models;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class September_day extends Model
{
    use HasFactory;

    protected $fillable = ['room_id'];

    public function __construct()
    {
        for ($day = 1; $day <= 31; $day++) {
            $this->fillable[] = 'day_' . $day . '_user_id';
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'day_1_user_id') // Esegui il collegamento con la colonna day_1_user_id
        ->orWhere('day_2_user_id')
        ->orWhere('day_3_user_id')
        ->orWhere('day_4_user_id')
        ->orWhere('day_5_user_id')
        ->orWhere('day_6_user_id')
        ->orWhere('day_7_user_id')
        ->orWhere('day_8_user_id')
        ->orWhere('day_9_user_id')
        ->orWhere('day_10_user_id')
        ->orWhere('day_11_user_id')
        ->orWhere('day_12_user_id')
        ->orWhere('day_13_user_id')
        ->orWhere('day_14_user_id')
        ->orWhere('day_15_user_id')
        ->orWhere('day_16_user_id')
        ->orWhere('day_17_user_id')
        ->orWhere('day_18_user_id')
        ->orWhere('day_19_user_id')
        ->orWhere('day_20_user_id')
        ->orWhere('day_21_user_id')
        ->orWhere('day_22_user_id')
        ->orWhere('day_23_user_id')
        ->orWhere('day_24_user_id')
        ->orWhere('day_25_user_id')
        ->orWhere('day_26_user_id')
        ->orWhere('day_27_user_id')
        ->orWhere('day_28_user_id')
        ->orWhere('day_29_user_id')
        ->orWhere('day_30_user_id')
        ->orWhere('day_31_user_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
