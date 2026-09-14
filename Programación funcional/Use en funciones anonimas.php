<?php 
//observa que no puedes acceder a una variable fuera del scope, requieres un use y solo es en funciones anonimas, o puedes acceder directamente con un arrow function
$mensaje="Hola";

$saludar=function ($nombre) use($mensaje){
    return "$mensaje $nombre";
};
$mensaje = "Buenas noches"; // Cambiamos la variable externa después

fn($nombre)=>"$mensaje $nombre";
echo $saludar("Mike");
//no es como js que puedes llamar a variables globales de forma inmediata

