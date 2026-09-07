<?php
//funcion flecha, limitada, solo se permite una expresion de retorno

$some = function ($a, $b): float {
    return $a + $b;
};
$sum = fn(float $a, float $b) => $a + $b;



function mul($a, $b): float
{
    return $a * $b;
}

function show(callable $fn, float $a, float $b): void
{
    echo $fn($a, $b);
}

show($sum, 5, 7);
show(fn($a,$b)=>$a-$b, 5, 7);
