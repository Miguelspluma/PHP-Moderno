<?php
//no es mas que una tecnica de optimizacion para guardar el resultado de una operacion pesada en una cache o variable para no volver a ejecutar el mismo proceso

function addMemo()
{
    $cache = [];
    return function ($a, $b) use (&$cache) {
        $index = $a . "-" . $b;

        if (isset($cache[$index])) {
            echo "esa ya existia en cache <br>";
            print_r($cache);
            return $cache[$index];
        }
        echo "No existia en la cache la operacion <br>";
        $cache[$index] = $a + $b;
        print_r($cache);
        return $cache[$index];
    };
}

$mySum = addMemo();
echo $mySum(5, 1);
echo $mySum(5, 1);
echo $mySum(5, 2);
