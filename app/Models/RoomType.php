<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    protected $table = 'room_types';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'pricing',
        'discount',
        'description',
        'currency',
        'image',
        'accommodation_id',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'room_type_id');
    }

}
