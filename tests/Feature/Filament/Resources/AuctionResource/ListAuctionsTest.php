<?php

use App\Filament\Resources\AuctionResource\Pages\ListAuctions;
use App\Models\Auction;

use function Pest\Livewire\livewire;

// Before all
beforeEach(function () {
    actingAsAdmin();
});

// Render
describe('render', function () {
    it('can render page', function () {
        livewire(ListAuctions::class)->assertSuccessful();
    });


    it('can display auctions by default', function () {
        $auctions = Auction::factory()->count(4)->create();

        livewire(ListAuctions::class)
            ->assertCanSeeTableRecords($auctions)
            // ->assertCanNotSeeTableRecords($trashedPosts)
            ->assertCountTableRecords(4);
    });
});


// Columns
describe('columns', function () {
    it('can render auction titles', function () {
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
describe('sorting', function () {

})->skip();

// Searching
// describe('Searching', function () {});

// State
// describe('State', function () {});

// Existence
// describe('Existence', function () {});

// Authorization
// describe('Authorization', function () {});
