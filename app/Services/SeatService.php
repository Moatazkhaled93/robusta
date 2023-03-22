<?php

namespace App\Services;

use App\Models\Seat;

class SeatService {

    public function all($data) {
        $allSeats = Seat::all();
        $availableSeats = Seat::where('available', 1)->where(function ($query) use ($data) {
                    $routVilde = json_encode([$data['from'], $data['to']]);
                    $query->where('available_routs', 'like', "%{$routVilde}%")
                            ->orWhereNull('available_routs');
                })->pluck('id')->toArray();
        foreach($allSeats as $seat){
            if(!in_array($seat->id,$availableSeats)){
                $seat->available = 0;
            }
        }

        return $allSeats;
    }



}
