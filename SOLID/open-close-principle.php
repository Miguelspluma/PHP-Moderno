<?php

//principio de extender, pero no modificar los que ya existe, se usan interfases
class Calculator
{
    public function calculate($a, $b, $op)
    {
        if ($op == "sum") {
            return $a + $b;
        } else if ($op == "mul") {
            return $a * $b;
        } else if ($op == "sub") {
            return $a - $b;
        } else if ($op == "div") {
            return $a / $b;
        }
    }
} //esta clase no es escalable si te piden modificaciones










//version escalable con interfaces
interface OpcionInterface
{
    public function calculate(float $a, float $b);
}

class Suma implements OpcionInterface
{
    public function calculate(float $a, float $b)
    {
        return $a + $b;
    }
}
class Multiplicacion implements OpcionInterface
{
    public function calculate(float $a, float $b)
    {
        return $a * $b;
    }
}


class Operacion
{
    private OpcionInterface $opcion;

    public function __construct(OpcionInterface $opcion)
    {
        $this->opcion=$opcion;
    }

    public function run(float $a, float $b){
        return $this->opcion->calculate($a, $b);
    }
}

$mult=new Multiplicacion;

$suma=new Suma;
$operacion=new Operacion($mult);
echo $operacion->run(4,5);

