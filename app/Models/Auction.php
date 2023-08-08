<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
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
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'is_published' => 'boolean',
    ];

    // relationships

    // belongsTo
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    // hasMany
    public function items()
    {
        return $this->hasMany(AuctionItem::class);
    }
}
