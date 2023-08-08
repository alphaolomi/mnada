<div>
  {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

  <form wire:submit="save">

    <input type="hidden" wire:model="auctionItemID">

    <input type="text" wire:model="amount">

    <div>
      @error('amount')
        <span class="error">{{ $message }}</span>
      @enderror
    </div>

    <button type="submit">Submit</button>
  </form>
</div>
