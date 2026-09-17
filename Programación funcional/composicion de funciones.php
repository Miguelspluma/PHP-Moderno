<?php 
function composition($f1, $f2){
    return function($value)use($f1, $f2){
        return $f1($f2($value));
    };
}
//primero resulve f2, y luego f1
$add=fn($n)=>$n+10;
$mul=fn($n)=>$n*20;
$com=composition($add, $mul);

echo $com(4);