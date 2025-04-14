<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateHotel extends Model
{
    use HasFactory;

    protected $table = 'accommodations';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'business_information_id',
        'business_owner_id',
        'accommodations_name',
        'accommodations_address',
        'accommodations_registration_number',
    ];
}
