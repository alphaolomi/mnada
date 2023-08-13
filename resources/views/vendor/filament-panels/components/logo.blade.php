{{-- @if (filled($brand = filament()->getBrandName()))
    <div
        {{
            $attributes->class([
                'fi-logo text-xl font-bold leading-5 tracking-tight text-gray-950 dark:text-white',
            ])
        }}
    >
        {{ $brand }}
    </div>
@endif --}}
<div class="flex flex-row gap-2 align-middle items-center">
<img src="{{ asset('logo.png') }}" alt="logo" style="width: 40px; height: 40px;"><h3 class="text-xl font-bold leading-5 tracking-tight text-gray-950 dark:text-white">MNADA POA</h3>
</div>
