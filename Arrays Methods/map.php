<?php

require "modelsArray/People.php";
require 'modelsArray/functions.php';

use ModelsArray\People;

$people = [new People("juan", 20), new People("Pedrito", 59), new People("Mike", 29)];
show($people);

$names = array_map(fn($people) => $people->name, $people);
show($names);

//arrayMap tambien sirve para formatear arreglos
$namesWFormat = array_map(fn($person) => "<b style=\"color:red\" >" . $person->name . "</b>", $people);
show($namesWFormat);

//mostrar con numero
//aquí hay un truco, si usas 2 parametros en tu callback, tienes que pasarle 2 arrays al map, no solo uno, si lo haces se ira a error, el parametro 1 itera en el array1, y el parametro dos en el array2, por eso requiere 2 arrays para pasarle
$namesWNumbers = array_map(fn($people, $index) => $index . "- " . $people->name, $people, array_keys($people));
$namesWNumbers2 = array_map(fn($people, $index) => ["Id " . ($index + 1), "name" => $people->name], $people, array_keys($people));

show($namesWNumbers);


echo $namesWNumbers2[1]["name"];
