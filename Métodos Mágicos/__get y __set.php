<?php
declare(strict_types=1);

// $person = new Person();
// $person->name = 'Juan';

// $person->rocas=5;


// class Person
// {
//     public int $id;
//     public string $name;

//     public function __get($mike)
//     {
//         echo "No existen las $mike en el objeto";
//     }
//     public function __set($name, $value)
//     {
//         echo "No existe $name, $value";
//     }
// }

//ya no ita error, y retorna el nombre de la propiedad inexistente

/**___SET() */


class Usuario 
{
    private array $atributos = [];

    public function __set(string $name, mixed $value): void 
    {
        // Interceptamos la escritura para aplicar reglas
        if ($name === "edad" && $value <=0) {
            print("La edad no puede ser negativa.");
        }

        $this->atributos[$name] = $value;
    }

    public function getAtributos(){
        return $this->atributos; 
    }
}

$usuario=new Usuario();

$usuario->edad=30;
print_r($usuario->getAtributos());




class Person
{
    public int $id;
    public string $name;
    public $data=array();

    public function __get($name)
    {
        "NO existe $name en objeto";
    }
    public function __set($name, $value)
    {
        $this->data[$name]=$value;
    }
}

echo "<br>";
echo "<br>";
echo "<br>";


$person = new Person();
$person->name = 'mikis <br>';
print_r($person->cocas);
$person->fuck='yea';
var_dump( $person->data);
