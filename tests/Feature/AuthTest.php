<?php

declare(strict_types=1);

use App\Models\User;

use function Pest\Laravel\get;
use function Pest\Laravel\post;

beforeEach(fn () => $this->user = User::factory()->create());

describe('auth', function (): void {
    beforeEach(fn () => $this->actingAs($this->user));

    test('cannot login when already logged in', function (): void {
        expect(true)->toBeTrue();
    });

    test('can logout', function (): void {
        expect(true)->toBeTrue();
    });
});
// ->skip(/* Skip the entire describe block */);

describe('guest', function (): void {
    it('can render login page', function (): void {
        get('/admin/login')->assertOk();
    });

    test('guest user can login', function (): void {
        $user = User::factory()->create();

        $response = post('/login', [
            'email'    => $user->email,
            'password' => 'password',
        ]);

        // $response->assertRedirect('/admin');
        expect($response->data)->dd();
    })->markTestIncomplete('This test has not been implemented yet.');
});
