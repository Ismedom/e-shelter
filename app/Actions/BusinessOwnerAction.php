<?php

namespace App\Actions;

class BusinessOwnerAction
{
    public function create(array $data)
    {
        return \App\Models\BusinessOwner::create([
            'user_id'    => $data['user_id'],
            'first_name' => isset($data['first_name']) ? trim($data['first_name']) : null,
            'last_name'  => isset($data['last_name']) ? trim($data['last_name']) : null,
            'middle_name'=> isset($data['middle_name']) ? trim($data['middle_name']) : null,
        ]);
    }
    public function createWithNullInformation(array $data)
    {
        return \App\Models\BusinessOwner::create([
            'user_id'    => $data['user_id'],
            'first_name' => null,
            'last_name'  => null,
            'middle_name'=> null,
        ]);
    }
}