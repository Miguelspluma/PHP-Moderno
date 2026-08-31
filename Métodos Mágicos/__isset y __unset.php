<?php

// declare(strict_types=1);
// $wine = new Wine();
// if (isset($wine->BoneCountry)) {
//     echo "Existe <br>";
// } else {
//     echo "No Existe <br>";
// }


// class Wine
// {
//     private $style;
//     private $country;
//     private $data = [
//         "name" => "Vinos",

//     ];

//     public function __isset($name)
//     {
//         echo "se comprueba existencias $name <br>";
//         return property_exists($this, $name);
//     }

//     public function __unset($name)
//     {
//         echo "Se intento eliminar la propiedad $name <br>";
//     }
// }


// unset





class Wine
{
    private $style = 'Tinto';
    private $country = 'México';

    public function __isset($name): bool
    {
        return property_exists($this, $name) && $this->$name !== null;
    }

    public function __unset($name): void
    {
        echo "Se intentó eliminar la propiedad: <b>$name</b><br>";

        // 1. Verificamos que la propiedad realmente exista en la clase
        if (property_exists($this, $name)) {
            // 2. La "destruimos" asignándole null
            $this->$name = null;
        }
    }

    public function getStyle()
    {
        return $this->style;
    }
}

$wine = new Wine();

// 1. Comprobamos que existe
var_dump(isset($wine->box)); // bool(true)
echo "<br>";

// 2. Intentamos borrar la propiedad privada desde afuera
unset($wine->box); 

// 3. Comprobamos de nuevo
var_dump(isset($wine->box)); // bool(false) porque ahora es null