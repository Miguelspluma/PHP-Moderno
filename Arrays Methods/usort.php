<?php 

require "modelsArray/People.php";
require 'modelsArray/functions.php';

use ModelsArray\People;


$people = [new People("juan", 20), new People("Pedrito", 59), new People("Mike", 29)];

usort($people, fn($person1, $person2)=>
    $person1->age<=>$person2->age
);

show($people);
usort($people, fn($person1, $person2)=>
    $person2->age<=>$person1->age
);

show($people);