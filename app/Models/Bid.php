<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bid extends Model
{
    use HasFactory;

    // fillable fields
    protected $fillable = [
        'amount',
        'auction_item_id',
        'bidder_id',
    ];

    // casts
    protected $casts = [
        'amount' => 'float',
    ];

    // belongsTo
    public function auctionItem(): BelongsTo
    {
        return $this->belongsTo(AuctionItem::class, 'auction_item_id');
    }

    public function bidder(): BelongsTo
    {
        return $this->belongsTo(User::class, 'bidder_id');
    }
}
