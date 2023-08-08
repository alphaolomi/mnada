<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionItem extends Model
{
    use HasFactory;

    // fillable fields
    protected $fillable = [
        'title',
        'description',
        'starting_price',
        'auction_id',
        'seller_id',
    ];

    // casts
    protected $casts = [
        'starting_price' => 'float',
    ];

    // relationships

    // belongsTo
    public function auction()
    {
        return $this->belongsTo(Auction::class, 'auction_id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
