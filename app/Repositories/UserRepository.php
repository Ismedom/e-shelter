<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

class UserRepository
{
    protected Builder $query;
    protected \App\Models\User $model;

    protected array $searchableColumns = [
        'first_name',
        'last_name',
        'email',
        'status',
        // 'role',
        'created_at'
    ];

    public function __construct(\App\Models\User $model){
        $this->model = $model;
        $this->query = $model->newQuery();
    }

    public function query(): Builder{
        return $this->query;
    }

    public function filterUser(array $filter=[], array $queryColumns = []){
        $search_term =  !empty($filter['search'])?'%' . $filter['search'] . '%':'';
        $_queryColumns = !empty($queryColumns) ? $queryColumns : $this->searchableColumns;
        $query = $this->query->when($search_term, function (Builder $q) use ($search_term, $_queryColumns) {
            $q->where(function ($subQuery) use ($search_term, $_queryColumns) {
                foreach ($_queryColumns as $column) {
                    if ($column === 'created_at') $subQuery->orWhereRaw("LOWER(CAST($column AS TEXT)) LIKE ?", ['%' . strtolower($search_term) . '%']);
                    else $subQuery->orWhereRaw("LOWER($column) LIKE ?", ['%' . strtolower($search_term) . '%']);
                }
            });
        })->when(!empty($filter['data_start']), function(Builder $q) use ($filter) {
            $q->whereDate('created_at', '>=', $filter['data_start']);
        })->when(!empty($filter['data_end']), function(Builder $q) use ($filter) {
            $q->whereDate('created_at', '<=', $filter['data_end']);
        })->when(!empty($filter['status']), function(Builder $q) use ($filter) {
            $q->whereIn('status', $filter['status']);
        })->when(!empty($filter['order_by']), function(Builder $q) use ($filter) {
            $q->orderBy('created_at', $filter['order_by']);
        });
        return $query;
    }

public function getGuests(array $query, array $queryColumns=[])
{
    $search_term = !empty($query['search']) ? '%' . strtolower($query['search']) . '%' : '';
    $_queryColumns = !empty($queryColumns) ? $queryColumns : array_diff($this->searchableColumns, ['status']);
    
    $guest_query = $this->query
        ->join('bookings', 'users.id', '=', 'bookings.user_id')
        ->where('users.status', 'active')
        ->select([
            'users.id',
            'users.first_name',
            'users.last_name',
            'users.email',
            \DB::raw('MAX(bookings.created_at) as latest_booking_created_at'),
            \DB::raw('MAX(bookings.status) as latest_booking_status'),
            \DB::raw('MAX(bookings.created_at) as order_column')
        ])
        ->whereIn('bookings.hotel_id', function ($q) use ($query) {
            $q->select('id')
              ->from('accommodations')
              ->where('business_owner_id', $query['id']);
        })
        ->whereNull('bookings.deleted_at')
        ->when($search_term, function (Builder $q) use ($search_term, $_queryColumns) {
            $q->where(function ($subQuery) use ($search_term, $_queryColumns) {
                foreach ($_queryColumns as $column) {
                    if ($column === 'created_at') {
                        $subQuery->orWhereRaw("LOWER(CAST(bookings.created_at AS TEXT)) LIKE ?", [$search_term]);
                    } else {
                        $subQuery->orWhereRaw("LOWER(users.{$column}) LIKE ?", [$search_term]);
                    }
                }
            });
        })->when(!empty($query['data_start']), function(Builder $q) use ($query) {
            $q->whereDate('bookings.created_at', '>=', $query['data_start']);
        })->when(!empty($query['data_end']), function(Builder $q) use ($query) {
            $q->whereDate('bookings.created_at', '<=', $query['data_end']);
        })->whereNull('users.deleted_at')
        ->groupBy(['users.id', 'users.first_name', 'users.last_name', 'users.email'])
        ->when(!empty($query['order_by']), function(Builder $q) use ($query) {
            $q->orderBy('order_column', $query['order_by']);
        });

    return $guest_query;
}


    public function __call($method, $parameters){
        $result = $this->query->$method(...$parameters);
        return $result instanceof Builder ? $this : $result;
    }
}