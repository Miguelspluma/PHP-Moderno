<?php

require "modelsArray/People.php";
require 'modelsArray/functions.php';

use ModelsArray\People;


$people = [new People("juan", 20), new People("Pedrito", 59), new People("Mike", 29)];


$greater25Years=array_filter($people,fn($people)=>$people->age>=25);
show($greater25Years);
