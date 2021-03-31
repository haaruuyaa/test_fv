<?php


namespace App\Repository;


use App\Model\Booking;
use App\Repository\Interfaces\BookingInterface;

class BookingRepository implements BookingInterface
{
    public function all()
    {
        return Booking::all();
    }

    public function getBooking($id)
    {
        return Booking::find($id);
    }

    public function addBooking($booking)
    {
        Booking::create($booking);
    }

    public function updateBooking($newBooking, Booking $booking)
    {
        $booking->update($newBooking);
    }

    public function deleteBooking($id)
    {
        Booking::destroy($id);
    }

}
