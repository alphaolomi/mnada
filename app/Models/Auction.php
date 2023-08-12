<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

final class Auction extends Model
{
    use HasFactory;

    // fillable fields
    protected $fillable = [
        'title',
        'description',
        'is_published',
        'start_time',
        'end_time',
        'seller_id',
    ];

    // casts
    protected $casts = [
        'start_time'   => 'datetime',
        'end_time'     => 'datetime',
        'is_published' => 'boolean',
    ];

    // relationships

    // belongsTo
    public function seller(): BelongsTo
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    // hasMany
    public function items(): HasMany
    {
        return $this->hasMany(AuctionItem::class);
    }

    // bids via Auction items
    public function bids(): HasManyThrough
    {
        return $this->hasManyThrough(Bid::class, AuctionItem::class);
    }
}
