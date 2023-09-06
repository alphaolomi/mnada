<?php

// https://laravel-news.com/pest-v2-16

it('should not use die, eval, sleep', function () {
    expect(['die', 'eval', 'sleep'])->not->toBeUsed();
});

it('should not use dd', function () {
    expect('dd')->not->toBeUsed();
});

it('can check string, cases, and digits', function () {
    expect('abcDef')->toBeCamelCase();
    expect('abc-def')->toBeKebabCase();
    expect('abc_def')->toBeSnakeCase();
    expect('AbcDef')->toBeStudlyCase();
    expect('9001')->toBeDigits();
})->skip('Pest does not support this yet');