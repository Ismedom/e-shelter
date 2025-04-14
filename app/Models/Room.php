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
        'status'
    ];
}
