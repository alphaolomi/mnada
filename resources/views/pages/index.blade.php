@php
  $auctions = App\Models\Auction::query()
      ->with(['items'])
      ->get();
@endphp

<div>
  <nav>
    <h1>Latest Auctions</h1>
    {{-- <hr>
    <livewire:on-this-page />
    <hr> --}}
    @guest
      <ul>
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
      </ul>

    @endguest
  </nav>

  @forelse  ($auctions as $auction)
    <div>
      <h1>{{ $auction->title }}</h1>
      <p>{{ $auction->description }}</p>
      @if ($auction->items->count() > 0)
        <div>
          <h2>Includes</h2>
          <ul>
            @foreach ($auction->items as $item)
              <li>{{ $item->title }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <p>Ends at: {{ $auction->end_time }}</p>
      <p>Added at: {{ $auction->created_at }}</p>
      <a href="{{ url('auctions/' . $auction->id) }}">Start bidding</a>
    </div>
    <hr>
  @empty
    <p>No auctions found at the moment. Please check back later.</p>
  @endforelse
</div>
