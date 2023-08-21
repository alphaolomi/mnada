<?php

declare(strict_types=1);

namespace App\Support;

/**
 * Class ThrowableClasses
 *
 * @package App\Support
 */
final class ThrowableClasses
{

    private $throwables = [];

    private $throwablesByParent = [];


    /**
     * ThrowableClasses constructor.
     *
     * @throws \RuntimeException When required functions are missing
     */
    public function __construct()
    {
        $this->validateFunctionExists('interface_exists');
        $this->throwables = $this->getThrowableClasses();
        $this->throwablesByParent = $this->splitInParents($this->throwables);
        // $this->printTree($throwablesByParent);
        // $this->validateAllClassesPrinted($throwablesByParent);
    }

    /**
     * Validate if a function exists
     *
     * @param string $functionName The function name to validate
     *
     * @throws \RuntimeException When the function does not exist
     */
    private function validateFunctionExists(string $functionName): void
    {
        if (!function_exists($functionName)) {
            throw new \RuntimeException("$functionName() is required");
        }
    }

    /**
     * List all throwable classes
     *
     * @return string[] An array of throwable class names
     */
    public function getThrowableClasses(): array
    {
        $result = [];
        $baseClass = interface_exists('Throwable') ? 'Throwable' : 'Exception';

        foreach (get_declared_classes() as $className) {
            if (is_subclass_of($className, $baseClass)) {
                $result[] = $className;
            }
        }

        return $result;
    }

    /**
     * Organize throwable classes by parent class
     *
     * @param string[] $classes An array of throwable class names
     *
     * @return array An associative array with parent classes as keys and arrays of child classes as values
     */
    private function splitInParents(array $classes): array
    {
        $result = [];

        foreach ($classes as $className) {
            $parent = (string)get_parent_class($className);
            $result[$parent][] = $className;
        }

        return $result;
    }

    /**
     * Get the tree of throwable classes organized by parent
     *
     * @return array The tree of throwable classes organized by parent
     */
    public function getTree(): array
    {
        return $this->throwablesByParent;
    }

    /**
     * Validate that all classes were printed
     *
     * @param array $tree The tree of throwable classes organized by parent
     *
     * @throws \RuntimeException When there are missing root classes
     */
    private function validateAllClassesPrinted(array $tree): void
    {
        if (!isset($tree[''])) {
            throw new \RuntimeException('No root classes!!!');
        }
    }

    /**
     * Print the tree of throwable classes
     *
     * @param array  $tree   The tree of throwable classes organized by parent
     * @param string $parent The parent class for which to print leaves
     * @param int    $level  The indentation level
     */
    public function printTree(array &$tree, string $parent = '', int $level = 0): void
    {
        if (isset($tree[$parent])) {
            $leaves = $tree[$parent];
            unset($tree[$parent]);
            natcasesort($leaves);

            foreach ($leaves as $leaf) {
                echo str_repeat('   ', $level), $leaf, "\n";
                $this->printTree($tree, $leaf, $level + 1);
            }
        }
    }

    // print
    /**
     * Print the tree of throwable classes
     */
    public function print(): void
    {
        $this->printTree($this->throwablesByParent);
    }
}
