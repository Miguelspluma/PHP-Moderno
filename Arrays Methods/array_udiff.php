<?php 

require "modelsArray/People.php";
require 'modelsArray/functions.php';

use ModelsArray\People;


$people1 = [new People("juan", 20), new People("Pedrito", 59), new People("Mike", 29)];

$people2 = [new People("juan", 20), new People("Diana", 59), new People("Mike", 29)];


$difference=array_udiff($people1,$people2,fn($person1, $person2)=>$person1->name<=>$person2->name);

show($difference);
