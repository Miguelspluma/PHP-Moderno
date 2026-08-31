<?php

// class Contestador
// {
//     // NO hay ningún método llamado "saludar" o "pagar" aquí adentro

//     public function __call(string $nombreMetodo, array $argumentos): void
//     {
//         echo "Intentaste llamar al método: <b>$nombreMetodo</b> <br>";
//         echo "Le pasaste estos datos: ";
//         print_r($argumentos);
//         echo "<br><hr>";
//     }
// }

// $miObjeto = new Contestador();

// // 1. Llamamos a algo que NO existe
// $miObjeto->saludar('Miguel', 'Mañana');

// // 2. Llamamos a otra cosa que tampoco existe
// $miObjeto->cobrarFactura(500);


// //call Static

// class ContestadorEstatico
// {
//     // DEBE llevar la palabra static
//     public static function __callStatic(string $nombreMetodo, array $argumentos): void
//     {
//         echo "Llamaste estáticamente a: <b>$nombreMetodo</b>";
//     }
// }

// // Usamos :: en lugar de ->
// ContestadorEstatico::hacerMagia();
// // Imprime: Llamaste estáticamente a: hacerMagia


// class BotCompras
// {
//     public function __call($name, $arguments) 
//     {
//         // 1. Separas la cadena por la palabra 'comprar'
//         $splode = explode("comprar", $name);
//         $cadena = $splode[1];

//         // 2. Usas $arguments[0] para sacar la cantidad del array
//         $cantidad = $arguments[0];

//         echo "Agregando $cantidad unidades de $cadena al carrito... <br>";
//     }
// }

// $bot = new BotCompras();

// $bot->comprarManzanas(5);
// $bot->comprarPizzas(2);
// $bot->comprarCervezas(12);


//log

class Engine
{
    private $fileName;
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    public function __call($name, $arguments)
    {
        $message= $name. " : ";
        $message.=$arguments[0]. " - ";
        $message.=date("Y-m-d H:i:s");

        if (!file_exists($this->fileName)) {
            file_put_contents($this->fileName, "");
        }

        file_put_contents($this->fileName, $message, FILE_APPEND);
    }


}


$engine=new Engine('log.txt');
$engine->log("El usuario ha echo lo siguiente");
