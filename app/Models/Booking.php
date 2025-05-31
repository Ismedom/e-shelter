<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'hotel_id',
        'room_id',
        'check_in',
        'check_out',
        'adults',
        'children',
        'total_price',
        'currency',
        'status',
        'payment_status',
        'booking_reference',
        'special_requests'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
        'total_price' => 'decimal:2',
    ];

    // constant 
    const CANCEL_BOOKING='cancel';
    const COMPLETED_BOOKING ='completed';
    const PENDING_BOOKING='pending';
    const CONFIRMED_BOOKING='confirmed';
    const NO_SHOW_BOOKING='no_show';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(AccommodationsType::class);
    }

    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }

    //scope query
    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    public function scopeActive($query)
    {
        return $query->whereNotIn('status', ['cancelled', 'completed']);
    }

    //boolean
    public function isCancellable(): bool
    {
        return !in_array($this->status, ['cancelled', 'completed', 'no_show']) 
            && $this->check_in > now();
    }
}