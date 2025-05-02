<?php

namespace App\Actions;

class BusinessInformationAction
{
    public function create(array $data)
    {
        return \App\Models\BusinessInformation::create([
            'business_owner_id'               => $data['business_owner_id'],
            'business_name'                   => trim($data['business_name']),
            'legal_business_name'             => $data['legal_business_name'],
            'business_address'                => $data['business_address'],
            'business_registration_number'    => $data['business_registration_number'],
            'busineproperty_types_address'    => $data['busineproperty_types_address'],
            'email_address'                   => $data['email_address'],
            'phone_number'                    => $data['phone_number'],
            'alternative_contact_information' => $data['alternative_contact_information'],
            'total_of_rooms'                  => $data['total_of_rooms'],
        ]);
    }

    public function createWithNullInformation(array $data)
    {
        return \App\Models\BusinessInformation::create([
            'business_owner_id'               => $data['business_owner_id'],
            'business_name'                   => null,
            'legal_business_name'             => null,
            'business_address'                => null,
            'business_registration_number'    => null,
            'busineproperty_types_address'    => null,
            'email_address'                   => null,
            'phone_number'                    => null,
            'alternative_contact_information' => null,
            'total_of_rooms'                  => null,
        ]);
    }
}