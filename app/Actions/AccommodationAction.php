<?php

namespace App\Actions;

class AccommodationAction
{
    public function create(array $data)
    {
        $accommodation = \App\Models\Accommodation::create([
            'business_information_id'           => $data['business_information_id']?? null,
            'business_owner_id'                 => $data['business_owner_id'],
            'accommodation_name'                => trim($data['accommodation_name']),
            'accommodation_type'                => $data['accommodation_type'],
            'accommodation_address'             => $data['accommodation_address'],
            'city'                              => trim($data['city']),
            'state_province'                    => $data['state_province'],
            'postal_code'                       => $data['postal_code'],
            'country'                           => $data['country'],
            'latitude'                          => $data['latitude'],
            'longitude'                         => $data['longitude'],
            'accommodation_registration_number' => $data['accommodation_registration_number'],
            'contact_email'                     => $data['contact_email'],
            'contact_phone'                     => $data['contact_phone'],
            'description'                       => $data['description']??'',
            'amenities'                         => $data['amenities']??'',
        ]);
        return $accommodation;
    }

    public function update(array $data, $id)
    {
        $accommodation = \App\Models\Accommodation::find($id)??null;
        if ($accommodation) {
            $accommodation->update([
                'business_information_id'           => $data['business_information_id']?? null,
                'business_owner_id'                 => $data['business_owner_id'],
                'accommodation_name'                => trim($data['accommodation_name']),
                'accommodation_type'                => $data['accommodation_type'],
                'accommodation_address'             => $data['accommodation_address'],
                'city'                              => trim($data['city']),
                'state_province'                    => $data['state_province'],
                'postal_code'                       => $data['postal_code'],
                'country'                           => $data['country'],
                'latitude'                          => $data['latitude'],
                'longitude'                         => $data['longitude'],
                'accommodation_registration_number' => $data['accommodation_registration_number'],
                'contact_email'                     => $data['contact_email'],
                'contact_phone'                     => $data['contact_phone'],
                'description'                       => $data['description'],
                'amenities'                         => $data['amenities'],
            ]);
        }
        return $accommodation;
    }
}