<?php

namespace App\Services;

use App\Models\ReservationSeat;
use App\Models\Seat;
use App\Models\Trip;

class BookingService {

    public function store($data) {
        $trip = Trip::find($data['trip_id']);
        $route = $trip->route;
        if ((int) $data['from'] == (int) $route[0] && (int) $data['to']  == (int) $route[count($route)-1]) {
            Seat::find($data['seat_id'])->update(['available'=> 0]);
        }elseif((int) $data['from'] == (int) $route[0] && (int) $data['to']  != (int) $route[count($route)-1]){
            $key = array_search($data['to'] , $route);
            $j = $key;
            $availableRouts = [];
            for($key ;$key< count($route); $key++){
                if ($key !=  count($route)-1) {
                    for ($i= count($route)-1 ; $i > $j; $i--) {
                        if ($key != $i) {
                            $availableRouts[]=[$route[$key],$route[$i]];
                        }
                    }
                }
            }
            Seat::find($data['seat_id'])->update(['available'=> 1 ,'available_routs'=> $availableRouts]);
        }elseif((int) $data['from'] != (int) $route[0] && (int) $data['to']  == (int) $route[count($route)-1]){
            $key = array_search($data['from'] , $route);
            $availableRouts = [];
            for($i = 0 ;$i< $key; $i++){
                    for ($j= $key ; $j>0; $j--) {
                        if ($j != $i) {
                            $availableRouts[]=[$route[$i],$route[$j]];
                        }
                    }
            }
            Seat::find($data['seat_id'])->update(['available'=> 1 ,'available_routs'=> $availableRouts]);
        }elseif((int) $data['from'] != (int) $route[0] && (int) $data['to']  != (int) $route[count($route)-1]){
            $key = array_search($data['from'] , $route);
            $availableRouts = [];
            for($i = 0 ;$i< $key; $i++){
                    for ($j= $key ; $j>0; $j--) {
                        if ($j != $i) {
                            $availableRouts[]=[$route[$i],$route[$j]];
                        }
                    }
            }
            $key = array_search($data['to'] , $route);
            $j = $key;
            for($key ;$key< count($route); $key++){
                if ($key !=  count($route)-1) {
                    for ($i= count($route)-1 ; $i > $j; $i--) {
                        if ($key != $i) {
                            $availableRouts[]=[$route[$key],$route[$i]];
                        }
                    }
                }
            }

            Seat::find($data['seat_id'])->update(['available'=> 1 ,'available_routs'=> $availableRouts]);
        }

        return ReservationSeat::create(['seat_id' => $data['seat_id'], 'trip_id' => $data['trip_id'], 'user_id' => $data['user_id'], 'from' => $data['from'], 'to' => $data['to']]);
    }

}
