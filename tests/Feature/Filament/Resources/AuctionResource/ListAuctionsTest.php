<?php

declare(strict_types=1);

use App\Filament\Resources\AuctionResource\Pages\ListAuctions;
use App\Models\Auction;

use function Pest\Livewire\livewire;

// Before all
beforeEach(function (): void {
    actingAsAdmin();
});

// Render
describe('render', function (): void {
    it('can render page', function (): void {
        livewire(ListAuctions::class)->assertSuccessful();
    });

    it('can display auctions by default', function (): void {
        $auctions = Auction::factory()->count(4)->create();

        livewire(ListAuctions::class)
            ->assertCanSeeTableRecords($auctions)
            // ->assertCanNotSeeTableRecords($trashedPosts)
            ->assertCountTableRecords(4);
    });
});

// Columns
describe('columns', function (): void {
    it('can render auction titles', function (): void {
        Auction::factory()->count(10)->create();

        livewire(ListAuctions::class)
            ->assertCanRenderTableColumn('title');
    });

    // it('can not render auction updated ', function () {
    //     Auction::factory()->count(10)->create();

    //     livewire(ListAuctions::class)
    //         ->assertCanNotRenderTableColumn('updated_at');
    // });
});

//Sorting
describe('sorting', function (): void {

})->skip();

// Searching
// describe('Searching', function () {});

// State
// describe('State', function () {});

// Existence
// describe('Existence', function () {});

// Authorization
// describe('Authorization', function () {});
