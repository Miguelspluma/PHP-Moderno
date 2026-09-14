<?php
//es una funcion de primer orden que se pasa como argumento a una funcion de orden superior

$numbers = [1, 2, 3, 4, 5];

function process(array $arr,  $callback): array
{
    $newArr = [];
    foreach ($arr as $element) {
        $newElement = $callback($element);
        $newArr[] = $newElement;
    }
    return $newArr;
}

$result1 = process($numbers, function ($e) {
    return $e * 2;
});

print_r($result1);
 