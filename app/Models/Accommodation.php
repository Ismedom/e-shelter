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
    
    public function user()
    {
        return $this->belongsTo(User::class, 'business_owner_id');
    }
    
    public function rooms(){
        return $this->hasMany(Room::class, 'accommodation_id');
    }

    public function posts(){
        return $this->hasMany(Post::class, 'accommodation_id');
    }

    public function roomTypes(){
        return $this->hasMany(RoomType::class,'accommodation_id');
    }
}
