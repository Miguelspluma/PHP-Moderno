<?php 

require 'modelsArray/functions.php';
//igual que map, solo que si soporta paso por referencia, si tratas de asignarlo a una variable solo retornara un true o false 0,1 si el array se modifico o no, pero no un nuevo array
$numbers=[1,2,3,4];

array_walk($numbers, function($num){
    echo $num."<br>";
});
$res=array_walk($numbers, function(&$num){
    $num*=2;
});
show($res);
