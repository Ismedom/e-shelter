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
        'role',
        'created_at'
    ];

    public function __construct(\App\Models\User $model){
        $this->model = $model;
        $this->query = $model->newQuery();
    }

    public function query(): Builder{
        return $this->query;
    }

    public function filterUser(?string $filter='', array $queryColumns = []): self{
        if (!empty($filter)) {
            $searchTerm = '%' . $filter . '%';
            $_queryColumns = !empty($queryColumns) ? $queryColumns : $this->searchableColumns;
            $this->query->where(function (Builder $q) use ($searchTerm, $_queryColumns) {
                foreach ($_queryColumns as $column) {
                    $q->orWhere($column, 'LIKE', $searchTerm);
                }
            });
        }
        return $this;
    }

    public function __call($method, $parameters){
        $result = $this->query->$method(...$parameters);
        return $result instanceof Builder ? $this : $result;
    }
}