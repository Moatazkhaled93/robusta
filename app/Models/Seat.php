<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'seats';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'seat_id',
        'bus_id',
        'available',
        'available_routs'
    ];

    public function setAvailableRoutsAttribute($attribute) {
        $this->attributes['available_routs'] = json_encode($attribute);
    }

    public function getAvailableRoutsAttribute($value) {
        return json_decode($value);
    }
}
