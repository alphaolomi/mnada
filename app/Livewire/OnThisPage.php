<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Illuminate\Support\Str;

class OnThisPage extends Component
{

    public $routeName;
    
    public $durationInSeconds = 10;

    public function mount(Request $request)
    {
        $this->routeName = sprintf(
            '%s:%s', 
            $request->route()->getName(),
            implode(':', $request->route()->originalParameters())
        );
    }


  private function logOnThisPage(Request $request): void
{
    $userId = $request->user()->id;
    $page = $this->routeName;
    $key = "{$page}:{$userId}";


    Redis::setex($key, $this->durationInSeconds, $userId);
}

   /** @return array<int> */
private function getUserIdsOnThisPage(Request $request): array
{
    $page = $this->routeName;

    return collect(Redis::keys("{$page}:*"))
        ->map(fn($key) => str_replace("{$page}:", '', $key))
        ->toArray();
}

    public function render(Request $request)
    {
        $this->logOnThisPage($request);

        $users = User::query()
            ->select('id', 'name', 'email')
            ->whereIn('id', $this->getUserIdsOnThisPage($request))
            ->get();


        // dd($users);

        return view('livewire.on-this-page', [
            'users' => $users,
            'duration' => $this->durationInSeconds,
        ]);
    }
}
