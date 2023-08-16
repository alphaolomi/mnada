<?php

use App\Support\ThrowableClasses;

it('can lists throwable classes', function () {
    $throwableClasses = new ThrowableClasses();
    $throwables = $throwableClasses->getThrowableClasses();

    expect($throwables)->toBeArray();
});

it('can get throwable classes as tree ', function () {
    $throwableClasses = new ThrowableClasses();
    $throwables = $throwableClasses->getTree();

    expect($throwables)->toBeArray();
});

it('cant print throwable classes as tree ', function () {
    $throwableClasses = new ThrowableClasses();
    ob_start();
    $throwableClasses->print();
    $output = ob_get_contents();
    ob_end_clean();
    expect($output)->toBeString();
});
