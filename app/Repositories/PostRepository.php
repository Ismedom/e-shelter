<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;

class PostRepository extends BaseRepository
{
    protected Builder $query;

    protected array $searchableColumns = [
        'first_name',
        'last_name',
        'email',
        'status',
        // 'role',
        'created_at'
    ];

    public function __construct()
    {
        parent::__construct(new Post());
    }

    public function listPosts(){
        $query = $this->query->select([
                'posts.*',
                'accommodations.id as accommodation_id',
                'accommodations.accommodation_name',
                'accommodations.accommodation_type',
                'accommodations.accommodation_address',
                'accommodations.city',
                'accommodations.state_province',
                'accommodations.contact_email',
                'accommodations.contact_phone',
                'accommodations.star_rating as accommodation_star_rating',
                'room_types.type as room_type_name',
                'room_types.discount as room_discount',
                'room_types.pricing as room_pricing',
                'room_types.description as room_description',
                'room_types.currency as room_currency',
                'room_types.image as room_image',
            ])
            ->join('accommodations', 'posts.accommodation_id', '=', 'accommodations.id')
            ->join('room_types', 'posts.room_type_id', '=', 'room_types.id');
        return $query;
    }

}
