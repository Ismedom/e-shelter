<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'rooms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable =[
        'room_number',
        'status',
        'accommodation_id'

    ];
    // status
    const STATUS_AVAILABLE = 'available';
    const STATUS_UNAVAILABLE = 'unavailable';
    const STATUS_BOOKED = 'booked';
    const STATUS_CLEANING = 'cleaning';
    const STATUS_MAINTENANCE = 'maintenance';
    const STATUS_CLEANED = 'cleaned';
    const STATUS_CHECKED_IN = 'checked_in';
    const STATUS_CHECKED_OUT = 'checked_out';
    const STATUS_RESERVED = 'reserved';
    const STATUS_DAMAGED = 'damaged';

    //relationships

    public function accommodation(){
        return $this->belongsTo(Accommodation::class, 'accommodation_id');
    }
}
