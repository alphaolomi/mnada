<?php

// write alot of BS code to test out Xdebug

function test($a, $b, $c, $d, $e, $f, $g, $h, $i, $j) {
    $a = $a + 1;
    $b = $b + 1;
    $c = $c + 1;
    $d = $d + 1;
    $e = $e + 1;
    $f = $f + 1;
    $g = $g + 1;
    $h = $h + 1;
    $i = $i + 1;
    $j = $j + 1;
    return $a + $b + $c + $d + $e + $f + $g + $h + $i + $j;
}

function test2($a, $b, $c, $d, $e, $f, $g, $h, $i, $j) {
    $a = $a + 1;
    $b = $b + 1;
    $c = $c + 1;
    $d = $d + 1;
    $e = $e + 1;
    $f = $f + 1;
    $g = $g + 1;
    $h = $h + 1;
    $i = $i + 1;
    $j = $j + 1;
    return $a + $b + $c + $d + $e + $f + $g + $h + $i + $j;
}

$result1 = test(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

echo "result1 = $result1\n";

$result2 = test2(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

echo "result2 = $result2\n";

