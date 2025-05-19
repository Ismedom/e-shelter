<?php

namespace App\Actions;

class BookingAction
{
    public function create(array $data)
    {
        return \App\Models\Booking::create([
            'hotel_id' => $data['accommodation_id'],
            'user_id'  => \Auth::user()->id,
            'room_id'  => $data['room_id'],
            'check_in' => $data['check_in'],
            'check_out'=> $data['check_out'],
            'total_price' => $data['total_price'],
            'booking_reference' => $data['booking_reference']

        ]);
    }

    public function update(array $data)
    {
        return \App\Models\Booking::update([
            'hotel_id' => $data['accommodation_id'],
            'user_id' => \Auth::user()->id,
            'room_id' => $data['room_id']
        ]);
    }
}