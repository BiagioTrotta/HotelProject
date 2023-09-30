<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'is_revisor',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

   /*  public function managerRooms1()
    {
        return $this->belongsToMany(ManagerRoom::class, 'user_manager_room', 'user_id', 'manager_room_id');
    } */

    public function managerRooms()
    {
        $relations = [];
        for ($day = 1; $day <= 31; $day++) {
            $columnName = 'day_' . $day;
            $relations[$columnName] = $this->belongsTo(ManagerRoom::class, $columnName);
        }
        return $relations;
    }

    public function augustDays()
    {
        return $this->hasMany(August::class, 'day_1_user_id') // Esegui il collegamento con la colonna day_1_user_id
        ->orWhere('day_2_user_id', $this->id)
            ->orWhere('day_3_user_id', $this->id)
            ->orWhere('day_4_user_id', $this->id)
            ->orWhere('day_5_user_id', $this->id)
            ->orWhere('day_6_user_id', $this->id)
            ->orWhere('day_7_user_id', $this->id)
            ->orWhere('day_8_user_id', $this->id)
            ->orWhere('day_9_user_id', $this->id)
            ->orWhere('day_10_user_id', $this->id)
            ->orWhere('day_11_user_id', $this->id)
            ->orWhere('day_12_user_id', $this->id)
            ->orWhere('day_13_user_id', $this->id)
            ->orWhere('day_14_user_id', $this->id)
            ->orWhere('day_15_user_id', $this->id)
            ->orWhere('day_16_user_id', $this->id)
            ->orWhere('day_17_user_id', $this->id)
            ->orWhere('day_18_user_id', $this->id)
            ->orWhere('day_19_user_id', $this->id)
            ->orWhere('day_20_user_id', $this->id)
            ->orWhere('day_21_user_id', $this->id)
            ->orWhere('day_22_user_id', $this->id)
            ->orWhere('day_23_user_id', $this->id)
            ->orWhere('day_24_user_id', $this->id)
            ->orWhere('day_25_user_id', $this->id)
            ->orWhere('day_26_user_id', $this->id)
            ->orWhere('day_27_user_id', $this->id)
            ->orWhere('day_28_user_id', $this->id)
            ->orWhere('day_29_user_id', $this->id)
            ->orWhere('day_30_user_id', $this->id)
            ->orWhere('day_31_user_id', $this->id);
    }
}
