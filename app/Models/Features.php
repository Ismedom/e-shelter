<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'features';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'image',
        'icon',
        'type',
        'status',
        'accommodation_id'
    ];
}
