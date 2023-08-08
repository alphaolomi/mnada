<?php

namespace App\Livewire;

use App\Models\Bid;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\Rule;

class CreateBid extends Component
{

    public $auctionItemId;

    #[Rule('required|numeric|min:0.01')]
    public $amount = '';

    public function mount($auctionItemId = null, $startAmount = null)
    {
        $this->auctionItemId = $auctionItemId;
        $this->amount = $startAmount;
    }

    public function save()
    {

        $bid = Bid::create([
            'bidder_id' => auth()->id(), // 'bidder_id' => '1
            'auction_item_id' => $this->auctionItemId,
            'amount' => $this->amount,
        ]);

        logger('bid posted', ['bid' => $bid]);

        $this->dispatch('bid-posted', $bid->id);
    }

    public function render()
    {
        return view('livewire.create-bid', [
            'auctionItem' => DB::table('auction_items')->where('id', $this->auctionItemId)->first(),
        ]);
    }
}
