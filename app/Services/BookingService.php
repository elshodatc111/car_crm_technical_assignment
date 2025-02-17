<?php
namespace App\Services;

use App\Models\Booking;

class BookingService
{
    public function createBooking(array $data)
    {
        return Booking::create($data);
    }

    public function deleteBooking($id)
    {
        $booking = Booking::findOrFail($id);
        return $booking->delete();
    }
}
