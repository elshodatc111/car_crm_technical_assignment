<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Services\BookingService;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\IndexBookingRequest;
use App\Http\Requests\DestroyBookingRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function store(StoreBookingRequest $request)
    {
        $validated = $request->validated();
        
        $validated['start_time'] = Carbon::parse($validated['start_time'])->format('Y-m-d H:i:s');
        $validated['end_time'] = Carbon::parse($validated['end_time'])->format('Y-m-d H:i:s');
    
        $booking = $this->bookingService->createBooking($validated);
        
        return response()->json($booking, 201);
    }

    public function index($id){
        $bookings = Booking::where('car_id', $id)->get();
        return response()->json($bookings, 200);
    }

    public function destroy($id){
        if(Booking::find($id)){
            $this->bookingService->deleteBooking($id);
            return response()->json(['message' => 'Бронирование успешно удалено.'], 200);
        }else{
            return response()->json(['message' => 'Найдите идентификационный номер.'], 412);
        }
    }
}
