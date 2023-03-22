<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Services\BookingService;
use App\Http\Requests\BookingRequest;

class BookingController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request,BookingService $bookingService) {

        try {
            $booking = $bookingService->store($request->validated());
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), $exception->getMessage(), 404);
        }

        return $this->sendResponse($booking, 'Booking  successfully.');
    }

}
