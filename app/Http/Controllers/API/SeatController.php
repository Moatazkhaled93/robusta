<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Services\SeatService;
use App\Http\Requests\SeatRequest;

class SeatController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SeatRequest $request,SeatService $seatService) {

        try {
            $seats = $seatService->all($request->validated());
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), $exception->getMessage(), 404);
        }

        return $this->sendResponse($seats, 'Seats list successfully.');
    }

}
