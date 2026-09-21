<?php 

require "modelsArray/People.php";
require 'modelsArray/functions.php';

use ModelsArray\People;


$people = [new People("juan", 20), new People("Pedrito", 59), new People("Mike", 29)];

//recibe 3 argumentos el callback, $array, $funcion a ejecutar, inicializacion del parametro de la funcion. la funcion de primer orden ocupa 2 parametros, variable donde almacenar el valor, elemento alrecorrer el array.
$sum = array_reduce($people, fn($actual, $element)=>$actual + $element->age, 0);
echo $sum;

$html=array_reduce($people, fn($current, $person)=>$current."<li>".$person->name."</li>","<ul>");
$html.="</ul>";

echo $html;