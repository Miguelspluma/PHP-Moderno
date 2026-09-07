<?php 
//es una funcion que puede recibir como parametro otras funciones, o retornar otra funcion como resultado 

$some= function($a, $b):float{
    return $a+$b;
};

function mul($a, $b):float{
    return $a*$b;
}

function show (callable $fn, float $a, float $b):void
{
    echo $fn($a, $b);
}

show("mul",5,7);
show($some,5,7);
