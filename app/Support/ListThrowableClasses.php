<?php

declare(strict_types=1);

namespace App\Support;

final class ListThrowableClasses
{
    public function __construct()
    {
        if (!function_exists('interface_exists')) {
            throw new \RuntimeException('interface_exists() is required');
        }

        $throwables          = $this->listThrowableClasses();
        $throwablesPerParent = $this->splitInParents($throwables);
        $this->printTree($throwablesPerParent);

        if (0 !== count($throwablesPerParent)) {
            throw new \RuntimeException('Not all classes were printed');
        }
    }

    /**
     * 
     */
    public function listThrowableClasses(): array
    {
        $result = [];
        if (interface_exists('Throwable')) {
            foreach (get_declared_classes() as $className) {
                $implements = class_implements($className);
                if (isset($implements['Throwable'])) {
                    $result[] = $className;
                }
            }
        } else {
            foreach (get_declared_classes() as $className) {
                if ('Exception' === $className || is_subclass_of($className, 'Exception')) {
                    $result[] = $className;
                }
            }
        }

        return $result;
    }

    public function splitInParents($classes)
    {
        $result = [];
        foreach ($classes as $className) {
            $parent = (string) get_parent_class($className);
            if (isset($result[$parent])) {
                $result[$parent][] = $className;
            } else {
                $result[$parent] = [$className];
            }
        }

        return $result;
    }

    public function printTree(&$tree): void
    {
        if (!isset($tree[''])) {
            throw new \RuntimeException('No root classes!!!');
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
