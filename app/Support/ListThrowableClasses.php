<?php

declare(strict_types=1);

namespace App\Support;

final class ListThrowableClasses
{
    public function __construct()
    {
        if ( ! function_exists('interface_exists')) {
            exit('PHP version too old');
        }

        $throwables          = $this->listThrowableClasses();
        $throwablesPerParent = $this->splitInParents($throwables);
        $this->printTree($throwablesPerParent);

        if (0 !== count($throwablesPerParent)) {
            exit('ERROR!!!');
        }
    }

    public function listThrowableClasses()
    {
        $result = [];
        if (interface_exists('Throwable')) {
            foreach (get_declared_classes() as $cn) {
                $implements = class_implements($cn);
                if (isset($implements['Throwable'])) {
                    $result[] = $cn;
                }
            }
        } else {
            foreach (get_declared_classes() as $cn) {
                if ('Exception' === $cn || is_subclass_of($cn, 'Exception')) {
                    $result[] = $cn;
                }
            }
        }

        return $result;
    }

    public function splitInParents($classes)
    {
        $result = [];
        foreach ($classes as $cn) {
            $parent = (string) get_parent_class($cn);
            if (isset($result[$parent])) {
                $result[$parent][] = $cn;
            } else {
                $result[$parent] = [$cn];
            }
        }

        return $result;
    }

    public function printTree(&$tree): void
    {
        if ( ! isset($tree[''])) {
            exit('No root classes!!!');
        }
        $this->printLeaves($tree, '', 0);
    }

    public function printLeaves(&$tree, $parent, $level): void
    {
        if (isset($tree[$parent])) {
            $leaves = $tree[$parent];
            unset($tree[$parent]);
            natcasesort($leaves);
            $leaves = array_values($leaves);
            $count  = count($leaves);
            for ($i = 0; $i < $count; $i++) {
                $leaf = $leaves[$i];
                echo str_repeat('   ', $level), $leaf, "\n";
                $this->printLeaves($tree, $leaf, $level + 1);
            }
        }
    }
}
