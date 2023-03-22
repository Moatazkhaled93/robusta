<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationSeat extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'reservations_seats';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'seat_id',
        'trip_id',
        'user_id',
        'from',
        'to'
    ];
}
