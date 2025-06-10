<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected Model $model;
    protected Builder $query;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->query = $model->newQuery();
    }

    public function query(): Builder
    {
        return $this->query;
    }

    public function __call($method, $parameters)
    {
        $result = $this->query->$method(...$parameters);
        return $result instanceof Builder ? $this : $result;
    }
}