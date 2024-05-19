# Install
```bash
composer require krzysztofzylka/arrays
```

# Methods
## Escape array values
```php
\Krzysztofzylka\Arrays\Arrays::escape($array)
```
## Html special chars array values
```php
\Krzysztofzylka\Arrays\Arrays::htmlSpecialChars($array)
```
## Trim values
```php
\Krzysztofzylka\Arrays\Arrays::trim($array)
```
## Get value from an array using a dot-separated string as the key
```php
\Krzysztofzylka\Arrays\Arrays::getFromArrayUsingString($string, $array)
```
## Merge recursive distinct array
```php
\Krzysztofzylka\Arrays\Arrays::mergeRecursiveDistinct($array1, $array2)
```
## In array keys
```php
\Krzysztofzylka\Arrays\Arrays::inArrayKeys($keyValue, $array)
```
## Reduce array
```php
\Krzysztofzylka\Arrays\Arrays::reduction($array)
```
## Get nested value
```php
\Krzysztofzylka\Arrays\Arrays::getNestedValue($array, $keys)
```