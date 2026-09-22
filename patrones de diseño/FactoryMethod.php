<?php
//interface
interface Hamburguesa {
    public function obtenerPrecio(): int;
}

//producto1
class HamburguesaCarne implements Hamburguesa {
    public function obtenerPrecio(): int {
        return 100;
    }
}
//producto2
class HamburguesaVegetariana implements Hamburguesa {
    public function obtenerPrecio(): int {
        return 120;
    }
}

//la fabrica
class CocinaFactory {
    public static function crearHamburguesa(string $tipo): Hamburguesa {
        // AQUÍ es donde se "prepara" e instancia el objeto
        if ($tipo === 'vegetariana') {
            return new HamburguesaVegetariana();
        }
        
        return new HamburguesaCarne();
    }
}

// El cliente solo pide el objeto preparado a la fábrica:
$miPedido = CocinaFactory::crearHamburguesa('');

// Y usa los métodos de la hamburguesa que le entregaron:
echo "El precio es: " .$miPedido->obtenerPrecio() . "<br>"; // Output: El precio es: $120













//ejemplo 2

interface BeerInterface{ //product
    public function getPrice():float;
}


class Lager implements BeerInterface{ //concreteProduct
    private float $tax;
    private int $price;

    public function __construct(int $price,float $tax){
        $this->tax=$tax;
        $this->price=$price;
    }
    public function getPrice():float{
        return $this->price + $this->tax;
    }


}

class Victoria implements BeerInterface{ //concreteProduct
    private float $price;
    private float $discount;

    public function __construct(float $price, float $discount){
        $this->price=$price;
        $this->discount=$discount;
    }

    public function getPrice():float{
        return $this->price - $this->discount;
    }
}


abstract class BeerFactory{ //creator
    abstract public function create(array $params):BeerInterface;
}

class LagerFactory extends beerFactory{//concreteCreator
    public function create(array $params):BeerInterface{
        return new Lager($params['price'], $params['tax']);
    } 
}

class VictoriaFactory extends beerFactory{//concreteCreator
    public function create(array $params):BeerInterface{
        return new Victoria($params['price'], $params['discount']);
    }
}

$victoriaFactory=new VictoriaFactory();
$victoria=$victoriaFactory->create(['price'=>10, 'discount'=>2]);
echo "$ ".$victoria->getPrice()."<br>";

$lagerFactory=new LagerFactory();
$lager=$lagerFactory->create(['price'=>10, 'tax'=>2]);
echo "$ ".$lager->getPrice()."<br>";

