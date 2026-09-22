<?php
//extiende las responsabilidades de un objeto y le da dinamismo en tiempo real sin usar herencia explicita

interface BudgetInterface
{
    public function cost(): float;
}

//clase base del objeto a envorlver
class BasicBudget implements BudgetInterface
{
    private int $hours;
    private float $hourlyRate;

    public function __construct(int $hours, float $hourlyRate)
    {
        $this->hours = $hours;
        $this->hourlyRate = $hourlyRate;
    }

    public function cost(): float
    {
        return $this->hours * $this->hourlyRate;
    }
}

//decorador coneccion
abstract class BudgetDecorator implements BudgetInterface
{
    protected BudgetInterface $budget;

    public function __construct(BudgetInterface $budget)
    {
        $this->budget = $budget;
    }
    public function cost(): float
    {
        //clave del patron decorador
        return $this->budget->cost();
    }
}

//decorador 1
class foreignBudgetDecorator extends BudgetDecorator
{
    const EXCHANGE_RATE = 1.5;

    public function cost(): float
    {
        return parent::cost() * self::EXCHANGE_RATE;
    }
}

//decorador 2
class CustomerBudgetDecorator2 extends BudgetDecorator{
    const DISCOUNT=0.6;
    public function cost():float{
        return parent::cost()*self::DISCOUNT;
    }
}


$budget=new BasicBudget(10,100);
echo "base ".$budget->cost()."<br>";

$foreignBudget=new foreignBudgetDecorator($budget);
echo "base ".$foreignBudget->cost()."<br>";


$customerBudget2=new CustomerBudgetDecorator2($budget);
echo "base ".$customerBudget2->cost()."<br>";


//muñeco
interface Personaje{
    public function vestir();
}
class MunecoBase implements Personaje {
    public function vestir(): string {
        return "Muñeco desnudo";
    }
}

abstract class RopaDecorador implements Personaje {
    protected Personaje $personaje;

    // Guarda el objeto que va a envolver
    public function __construct(Personaje $personaje) {
        $this->personaje =$personaje;
    }
}

class ConGorra extends RopaDecorador {
    public function vestir(): string {
        return $this->personaje->vestir() . " + Gorra";
    }
}

class ConChamarra extends RopaDecorador {
    public function vestir(): string {
        return $this->personaje->vestir() . " + Chamarra";
    }
}

class ConBotas extends RopaDecorador {
    public function vestir(): string {
        return $this->personaje->vestir() . " + Botas";
    }
}

// Caso 1: Muñeco básico solo con Gorra
$personaje1 = new MunecoBase();
$personaje1 = new ConGorra($personaje1);
echo $personaje1->vestir();