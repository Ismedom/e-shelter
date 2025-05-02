<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
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
        'accommodation_name',
        'accommodation_type',
        'accommodation_address',
        'city',
        'state_province',
        'postal_code',
        'country',
        'latitude',
        'longitude',
        'accommodation_registration_number',
        'contact_email',
        'contact_phone',
        'description',
        'amenities',
    ];
    
}
