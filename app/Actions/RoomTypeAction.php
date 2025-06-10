<?php

namespace App\Actions;

class RoomTypeAction
{
    public function create(array $data)
    {
        return \App\Models\RoomType::create([
            'type'    => $data['type'],
            'pricing' => $data['pricing'] ,
            'currency'=> $data['currency'] ,
            'discount'=> $data['discount'] ,
            'description' => $data['description'],
            'accommodation_id' => $data['accommodation_id']
        ]);
    }
    public function update(array $data)
    {
        $room_type = \App\Models\RoomType::find($data['id']);
        if ($room_type) {
            $room_type->update([
                'type'    => $data['type'],
                'pricing' => $data['pricing'] ,
                'currency'=> $data['currency'] ,
                'discount'=> $data['discount'] ,
                'description' => $data['description'],
            ]);
        }
        return $room_type;
    }
}