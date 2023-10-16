<?php

namespace App\Models;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MonthlyDay extends Model
{
    use HasFactory;
    protected $table = 'monthly_days';

    protected $fillable = [
        'room_id',
        'month',
        'checkin',
        'checkout',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
