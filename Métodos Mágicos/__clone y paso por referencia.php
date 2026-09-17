<?php
$array1=[1,2,3];
$array2=$array1;
$array2[]=10;

print_r($array2);
class A{
    public string $label;
    
}


class Some{
    public string $name;
    public A $a;
    public function __clone()
    {
        $this->name=strtoupper($this->name);
        $this->a=clone $this->a;
    }
}

function change(Some $some){
    $some->name="Ya no tiene algo, se cambio su valor";
}


$some=new Some();
$some->a = new A();
$some->name="Algo <br>";
$some->a->label="hay  Algo <br>";
$some2=$some;
$some2->name="Lo cambio <br>";

change($some);

$newSome=clone $some;
$newSome->a->label="cambio el label <br>";
echo $newSome->a->label;
echo $some->a->label;



