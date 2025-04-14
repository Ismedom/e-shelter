<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomFeatures extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'room_features';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'room_id',
        'feature_id'
    ];
}
