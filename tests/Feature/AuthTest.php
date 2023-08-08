<?php

use App\Models\User;

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
    test('can login', function () {
        expect(true)->toBeTrue();
    });
 
    // ...
});