<?php

use function Pest\Laravel\{get};
use App\Models\User;
use function Pest\Laravel\{actingAs};
 

it('returns a successful response', function () {
    get('/')->assertStatus(200);
});


test('authenticated user can access the dashboard', function () {
    $user = User::factory()->create();
 
    actingAs($user)
        ->get('/admin')
        ->assertStatus(200);
});