<?php

use App\Support\ListThrowableClasses;

test('listThrowableClasses lists throwable classes', function () {
    $listThrowableClasses = new ListThrowableClasses();
    $throwables = $listThrowableClasses->listThrowableClasses();

    // Your assertions here based on the expected behavior of listThrowableClasses.
    // For example, you might want to check if certain classes are present in the $throwables array.
    
    expect($throwables)->toContain('SomeThrowableClass');
    expect($throwables)->toContain('AnotherThrowableClass');
    
    // You can add more assertions as needed.
});

// test('splitInParents splits classes into parent arrays', function () {
//     $listThrowableClasses = new ListThrowableClasses();
//     $inputClasses = ['ClassA', 'ClassB', 'ClassC'];
//     $splitClasses = $listThrowableClasses->splitInParents($inputClasses);

//     // Your assertions here based on the expected behavior of splitInParents.
//     // For example, you might want to check if classes are grouped under appropriate parents.
    
//     expect($splitClasses)->toHaveKey(''); // Root classes
//     expect($splitClasses[''])->toBeArray(); // Root classes array
    
//     // You can add more assertions as needed.
// });

// test('printTree prints the class tree', function () {
//     // Since printTree echoes the output, we need to capture it for testing.
//     $capturedOutput = captureOutput(function () {
//         $listThrowableClasses = new ListThrowableClasses();
//         $throwables = $listThrowableClasses->listThrowableClasses();
//         $throwablesPerParent = $listThrowableClasses->splitInParents($throwables);
//         $listThrowableClasses->printTree($throwablesPerParent);
//     });

//     // Your assertions here based on the expected behavior of printTree.
//     // You might want to assert if certain classes are present in the captured output.
    
//     expect($capturedOutput)->toContain('SomeThrowableClass');
//     expect($capturedOutput)->toContain('AnotherThrowableClass');
    
//     // You can add more assertions as needed.
// });
