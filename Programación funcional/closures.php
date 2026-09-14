<?php 
//existen 2 tipos de closures, la primera se genera en automatico cada que creas una funcion anonima o arrow function y es un tipo de dato objeto

//la segunda es una funcion que recuerda el entorno donde nacio, Es una función que "atrapa" o "empaca" variables de su entorno exterior y se las lleva guardadas adentro.

// Esta es la fábrica
function crearEstampadora(string $textoGuardado) {
    
    // Retornamos la función anónima (El Closure).
    // Esta función captura y "guarda en su mochila" la variable $textoGuardado.
    return function(string $tipoDePrenda) use ($textoGuardado) {
        return "Estampando '{$textoGuardado}' en una {$tipoDePrenda} <br>";
    };

}
// 1. Creamos una estampadora para la sección VIP
$estampadoraVip = crearEstampadora("VIP");

echo $estampadoraVip("Playera"); 
// Imprime: Estampando 'VIP' en una Playera

// 2. Creamos otra estampadora para el personal de STAFF
$estampadoraStaff = crearEstampadora("STAFF");
echo $estampadoraStaff("Chamarra"); 
// Imprime: Estampando 'STAFF' en una Chamarra
// Ahora ejecutamos las funciones pasando SOLO la prenda:
function hi(){
    $count=0;
    return function() use($count){
    $count++;
    return "Hola $count";//como no esta en un return el coun++ ya muestra 
    };
}
$h1=hi();
echo $h1()." <br>";