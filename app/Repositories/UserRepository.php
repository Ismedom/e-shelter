<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

class UserRepository
{
    protected $model;

    protected array $searchableColumns = [
        'first_name',
        'last_name',
        'email',
        'status',
        'role',
        'created_at'
    ];

    public function __construct(\App\Models\User $model)
    {
        $this->model = $model;
    }

    public function filterUser(string $filter, array $queryColumns=[]): Builder
    {
        $query = $this->model->newQuery();
        $_queryColumns = !empty($queryColumns)?$queryColumns:$this->searchableColumns;

        if(empty($filter)) return $query;
        $searchTerm = '%' . $filter . '%';
        $query->where(function (Builder $q) use ($searchTerm, $_queryColumns) {
            foreach ($_queryColumns as $column) {
                $q->orWhere($column, 'LIKE', $searchTerm);
            }
        });

        return $query;
    }

}