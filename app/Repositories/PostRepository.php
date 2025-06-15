<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;

class PostRepository extends BaseRepository
{
    protected Builder $query;

    
    public function __construct()
    {
        parent::__construct(new Post());
    }

    public function listPosts($search_query = []){
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
            ->join('room_types', 'posts.room_type_id', '=', 'room_types.id')
            ->when(!empty($search_query['state_province']) && $search_query['is_province_only'], function(Builder $q) use ($search_query) {
                $q->where('accommodations.state_province', 'like', '%' . $search_query['state_province'] . '%');
            })
            ->when(!empty($search_query['search_terms']) && !$search_query['is_province_only'], function(Builder $q) use ($search_query) {
                $q->where('accommodations.accommodation_name', 'like', '%' . $search_query['search_terms'] . '%')
                ->orWhere('accommodations.accommodation_address', 'like', '%' . $search_query['search_terms'] . '%')
                ->orWhere('accommodations.accommodation_type', 'like', '%' . $search_query['search_terms'] . '%')
                ->orWhere('room_types.pricing', 'like', '%' . $search_query['search_terms'] . '%')
                ->orWhere('room_types.description', 'like', '%' . $search_query['search_terms'] . '%')
                ->orWhere('accommodations.state_province', 'like', '%' . $search_query['search_terms'] . '%')
                ->orWhere('accommodations.city', 'like', '%' . $search_query['search_terms'] . '%');
            });
            return $query;
    }

}
