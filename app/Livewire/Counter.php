<?php

declare(strict_types=1);

namespace App\Livewire;

use Livewire\Component;

final class Counter extends Component
{
    public $count = 1;

    public function increment(): void
    {
        $this->count++;
    }

    public function decrement(): void
    {
        $this->count--;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
