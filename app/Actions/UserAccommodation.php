<?php

namespace App\Actions;

class UserAccommodation
{
    public function create(array $data)
    {
        $userAccommodation = \App\Models\UserAccommodation::create([
            'user_id' => $data['user_id'],
            'accommodation_id' => $data['accommodation_id'],
        ]);
        return $userAccommodation;
    }
}