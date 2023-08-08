<div>
  <h1>{{ $auction->title }}</h1>
  <p>{{ $auction->description }}</p>
  @if ($auction->items->count() > 0)
    <div>
      <h2>Includes</h2>
      <ul>
        @foreach ($auction->items as $item)
          <li>
            <h2>{{ $item->title }}</h2>
            <p>{{ $item->description }}</p>
            <p>Start amount: TZS {{ $item->starting_price }}</p>
            <livewire:create-bid :auctionItemID="$item->id" :key="$item->id" :startAmount="$item->starting_price" />
          </li>
        @endforeach
      </ul>
    </div>
  @endif
  <p>Ends at: {{ $auction->end_time }}</p>
  <p>Added at: {{ $auction->created_at }}</p>
</div>
