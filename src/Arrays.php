<?php

namespace Krzysztofzylka\Arrays;

use Krzysztofzylka\Strings\Strings;

class Arrays
{

    /**
     * Escape table
     * @param array $data
     * @return array
     */
    public static function escape(array $data): array
    {
        $return = [];

        foreach($data as $name => $value) {
            $return[$name] = is_array($value) ? self::escape($value) : Strings::escape($value);
        }

        return $return;
    }

    /**
     * Remove special chars
     * @param array $data
     * @return array
     */
    public static function htmlSpecialChars(array $data): array
    {
        $return = [];

        foreach ($data as $name => $value) {
            $return[$name] = is_array($value)
                ? self::htmlSpecialChars($value)
                : (is_string($value) ? htmlspecialchars($value) : $value);
        }

        return $return;
    }

    /**
     * Trim
     * @param array $data
     * @return array
     */
    public static function trim(array $data): array
    {
        $return = [];

        foreach($data as $name => $value) {
            $return[$name] = is_array($value) ? self::trim($value) : trim($value);
        }

        return $return;
    }

    /**
     * Get value from an array using a dot-separated string as the key
     * @param string $name The dot-separated string representing the key to access the value in the array
     * @param array $array The array from which the value will be retrieved
     * @return mixed The value retrieved from the array using the dot-separated string as the key
     */
    public static function getFromArrayUsingString(string $name, array $array)
    {
        $arrayData = '$array[\'' . implode('\'][\'', explode('.', $name)) . '\']';

        return @eval("return $arrayData;");
    }

    /**
     * Merge recursive distinct array
     * @param array $array1
     * @param array $array2
     * @return array
     */
    public static function mergeRecursiveDistinct(array $array1, array $array2): array
    {
        $return = $array1;

        foreach ($array2 as $key => &$value) {
            if (is_array($value) && isset($return[$key]) && is_array($return[$key])) {
                $return[$key] = self::mergeRecursiveDistinct($return[$key], $value);
            } else {
                $return[$key] = $value;
            }
        }

        return $return;
    }

    /**
     * In array keys
     * @param string $name
     * @param array $array
     * @return bool
     */
    public static function inArrayKeys(string $name, array $array): bool
    {
        return in_array($name, array_keys($array));
    }

    /**
     * This method reduces the given array by removing elements based on a specified rule.
     * @param array $array The input array to be reduced.
     * @param int $nthElement The rule for removing elements. Every nth element will be removed. Defaults to 2.
     * @param bool $lastKey Determines whether the last key of the array should be skipped. Defaults to true.
     * @return array The reduced array.
     */
    public static function reduction(array $array, int $nthElement = 2, bool $lastKey = true): array
    {
        $i = 1;
        $first = true;
        $arrayLastKey = array_key_last($array);

        foreach (array_keys($array) as $key) {
            if ($lastKey && $key === $arrayLastKey) {
                continue;
            }

            if ($i === $nthElement) {
                $i = 1;
            } elseif (!$first) {
                unset($array[$key]);
                $i++;
            }

            $first = false;
        }

        return $array;
    }

    /**
     * Get nested value
     * @param $array
     * @param $keys
     * @return mixed|null
     */
    public static function getNestedValue($array, $keys)
    {
        foreach ($keys as $key) {
            if (isset($array[$key])) {
                $array = $array[$key];
            } else {
                return null;
            }
        }
        return $array;
    }

}