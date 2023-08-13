<div wire:poll.{{ $duration }}s>
  <div class="flex items-center overflow-hidden">
    <div class="text-gray-400">
      On this page
    </div>
    <ul class="ml-2 flex -space-x-2">
      @foreach ($users as $user)
        <li class="rounded-full border-2 border-white">
          {{ $user->name }} - {{ $user->emailo }}
        </li>
      @endforeach
    </ul>
  </div>
</div>
