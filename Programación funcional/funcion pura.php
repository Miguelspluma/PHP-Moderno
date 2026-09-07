<?php 
//funcion aislada que no modifica nada externo y siempre devuelve el mismo valor
//funcion inpura
class Counter{
    public $count;
}

$counter = new Counter;

function show (Counter $counter):string{
    //esta modificando una propiedad 
    $counter->count++;
    return $counter->count."<br>";
}


//funcion pura
function add(float $a, float $b):float
{
    return $a+$b;
}


echo add(1,4);