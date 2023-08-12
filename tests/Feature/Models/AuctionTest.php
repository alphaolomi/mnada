<?php

declare(strict_types=1);

// Auction model unit testing

use App\Models\Auction;
use App\Models\User;

use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;

it('can create auction', function (): void {
    $auction = Auction::factory()->create();

    assertDatabaseCount('auctions', 1);
    assertDatabaseHas('auctions', [
        'title'       => $auction->title,
        'description' => $auction->description,
    ]);
});

// test mdoel has fillable fields
it('has fillable fields', function (): void {
    $auction = new Auction();

    expect($auction->getFillable())->toEqual([
        'title',
        'description',
        'is_published',
        'start_time',
        'end_time',
        'seller_id',
    ]);
});

it('has correct relations to user', function (): void {
    $auction = Auction::factory()->create([
        'seller_id' => User::factory()->create()->id,
    ]);

    // test relationship with user
    expect($auction->seller)->toBeInstanceOf(User::class);
    expect($auction->seller->id)->toEqual($auction->seller_id);

    // test relationship with items
    expect($auction->items)->toBeInstanceOf(\Illuminate\Database\Eloquent\Collection::class);
    expect($auction->items())->toBeInstanceOf(\Illuminate\Database\Eloquent\Relations\HasMany::class);
    // test relationship with bids
    expect($auction->bids)->toBeInstanceOf(\Illuminate\Database\Eloquent\Collection::class);
    expect($auction->bids())->toBeInstanceOf(\Illuminate\Database\Eloquent\Relations\HasManyThrough::class);
});
