<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class accommodations_type extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'accommodations_type';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'accommodations_id',
        'type_id',
    ];

}
