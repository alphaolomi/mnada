<?php

use App\Models\User;

use function Pest\Laravel\get;
use function Pest\Laravel\post;

beforeEach(fn () => $this->user = User::factory()->create());

describe('auth', function () {
    beforeEach(fn () => $this->actingAs($this->user));

    test('cannot login when already logged in', function () {
        expect(true)->toBeTrue();
    });

    test('can logout', function () {
        expect(true)->toBeTrue();
    });
});
// ->skip(/* Skip the entire describe block */);

describe('guest', function () {
    it('can render login page', function () {
        get('/admin/login')->assertOk();
    });

    test('guest user can login', function () {
        $user = User::factory()->create();

        $response = post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        // $response->assertRedirect('/admin');
        expect($response->data)->dd();
    })->markTestIncomplete('This test has not been implemented yet.');
});
