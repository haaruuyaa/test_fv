<?php


namespace App\Repository\Interfaces;


use App\Model\Booking;

interface BookingInterface
{
    public function all();

    public function getBooking($id);

    public function addBooking($booking);

    public function updateBooking($newBooking,Booking $booking);

    public function deleteBooking($id);
}
