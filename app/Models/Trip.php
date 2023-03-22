<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'trips';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'bus_id',
        'from',
        'to',
        'data_time',
        'route'
    ];
    public function setRouteAttribute($attribute) {
        $this->attributes['route'] = json_encode($attribute);
    }

    public function getRouteAttribute($value) {
        return json_decode($value);
    }
}
