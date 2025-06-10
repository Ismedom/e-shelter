<?php

namespace App\Repositories;

use App\Models\Accommodation;
use Illuminate\Database\Eloquent\Builder;

class AccommodationRepository extends BaseRepository
{
    protected Builder $query;

    public function __construct()
    {
        parent::__construct(new Accommodation());
    }

    public function showDetails()
    {
        return $this->query
            ->with(['roomTypes' => function ($q) {
                $q->select([
                    'id',
                    'accommodation_id',
                    'type as title',
                    'description',
                    'pricing as price',
                    'currency',
                    'image'
                ]);
            }])
            ->select([
                'id',
                'accommodation_name as name',
                'accommodation_address as address',
                'city',
                'state_province',
                'country',
                'latitude',
                'longitude',
                'contact_email',
                'contact_phone',
                'description',
                'star_rating',
                'check_in_time',
                'check_out_time',
                'thumbnail_image'
            ])
            ->where('is_active', true);
    }
}
