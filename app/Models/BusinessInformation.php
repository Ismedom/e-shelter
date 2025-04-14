<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessInformation extends Model
{
    use HasFactory;

    protected $table = 'business_information';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'business_owner',
        'business_name',
        'legal_business_name',
        'business_address',
        'business_registration_number',
        'email_address',
        'phone_number',
        'alternative_contact_information',
        'total_of_rooms',
    ];
}
