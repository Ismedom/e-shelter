<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAccommodation extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $table = 'user_accommodation';
    protected $fillable = [
        'user_id',
        'accommodation_id',
    ];

    public function accommodations(){
        return $this->belongsToMany(Accommodation::class, 'user_accommodation');
    }
}
