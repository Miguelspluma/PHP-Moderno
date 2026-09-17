<?php

function procesarDatos($datos)
{
    // Desestructurando el array dentro de la función
    [
        $nombre,
        $edad
    ] = $datos;

    echo "Nombre: $nombre, Edad: $edad";
}

procesarDatos(['Ana', 30]);


function saludar($usuario)
{
    foreach ($usuario as  $usuarios) {
        # code...
        ["nombre" => $nombre, "edad" => $edad] = $usuarios;
        echo "<br> Hola $nombre, tienes $edad años<br>";
    }
}

$usuario = [
    [
        "nombre" => "Juan",
        "edad" => 25
    ],
    [
        "nombre" => "Mike",
        "edad" => 13
    ]
];

saludar($usuario);

//argument unpacking es descomponer un array en argumentos para una funcion

function multiplicar($a, $b, $c)
{
    return $a * $b * $c . "<br>";
}
$numeros = [5, 7, 8];

echo multiplicar(...$numeros);


//variadic Parameters, empaqueta todos los argumentos en un array

function sumar(...$numeros)
{
    return array_sum($numeros) . "<br>";
}

echo sumar(20, 40, 20);


//pipes

function miPipe(...$funcs): callable
{

    return function ($value) use ($funcs):string {
        foreach ($funcs as $function) {
            $value=$function($value);
        }
        return $value;
    };
}

//lista de funciones
function toUpper($s):string{
    return strtoupper($s);
}

function replaceSpace($s):string{
    return str_replace(" ", "", $s);
}
function replaceNumbers($s):string{
    return preg_replace('/\d+/u','',$s);
}


$pipa=miPipe('toUpper','replaceSpace', 'replaceNumbers');
echo $pipa("ABcdef 00832 Mike");

//funcion pipe moderna
$resultado = "ABcdef 00832 Mike"
    |> 'toUpper'
    |> 'replaceSpace'
    |> 'replaceNumbers';

echo "<br> $resultado"; // ABCDEFMIKE