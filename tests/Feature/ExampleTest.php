<?php

declare(strict_types=1);

use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

it('returns a successful response', function (): void {
    actingAs(User::factory()->create());
   get('/')->assertOk();
//    get('/')->dd();
});
