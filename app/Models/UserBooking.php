<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBooking extends Model
{
    use HasFactory;

    protected $table ='user_bookings';

    protected $fillable =[
        'accommodation_id',
        'user_id',
        'room_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function accommodation(){
        return $this->belongsTo(Accommodation::class);
    }
}
