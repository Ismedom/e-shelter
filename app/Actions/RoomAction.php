<?php

namespace App\Actions;

class RoomAction
{
    public function create(array $data)
    {
        return \App\Models\Room::create([
            'room_number' => $data['room_number'],
            'status' => $data['status'],
            'accommodation_id' => $data['accommodation_id'],
        ]);
    }
}