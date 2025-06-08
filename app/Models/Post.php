<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'accommodation_id',
        'room_type_id',
        'title',
        'description',
        'slug',
        'meta_title',
        'tags',
        'img',
        'star_rating',
    ];

    protected $casts = [
        'tags' => 'array',
        'star_rating' => 'float',
    ];

    public function getRouteKeyName(): string
{
        return 'slug';
    }

    public static function booted()
    {
        static::creating(function (self $post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title) . '-' . Str::random(6);
            }
        });
    }

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class);
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('meta_title', 'like', "%{$search}%");
        });

        $query->when($filters['tags'] ?? false, function ($query, $tags) {
            $query->whereJsonContains('tags', $tags);
        });

        $query->when($filters['room_type_id'] ?? false, fn($q, $val) => $q->where('room_type_id', $val));
        $query->when($filters['accommodation_id'] ?? false, fn($q, $val) => $q->where('accommodation_id', $val));
    }
}
