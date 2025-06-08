<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'accommodation_id',
        'amount',
        'currency',
        'payee',
        'transfer_to',
        'payment_method',
        'reference',
        'meta',
        'paid_at',
    ];

    protected $casts = [
        'meta' => 'array',
        'paid_at' => 'datetime',
        'amount' => 'decimal:2',
    ];

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class);
    }

    public function scopePaid($query)
    {
        return $query->whereNotNull('paid_at');
    }

    public function scopeUnpaid($query)
    {
        return $query->whereNull('paid_at');
    }

    public function isPaid(): bool
    {
        return !is_null($this->paid_at);
    }

    public function markAsPaid(): void
    {
        $this->update(['paid_at' => now()]);
    }
}
