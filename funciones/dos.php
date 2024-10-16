<?php
function cambiarValor($a){
    $a=123;
    echo "En la funcion \$a=$a<br>";
}

function cambiarValor1($a){
    $a=123;
    echo "En la funcion cambiarVlor1 \$a=$a<br>";
    return $a;
}
//Dos formas de manipular las variable globales
//1.- Pasar valores por referencia
function cambiarValor3(&$variable){
    $variable=123;
}
//2.- usar la palabra reservada global
function cambiarValor4(){  //No necesito pasar la variable
    global $a;
    $a=193;
}

$a=100;
cambiarValor($a);
echo "Despues de llamar a la funcion y fuera de ella \$a=$a<br>";

$a=cambiarValor1($a);

echo "Despues de llamar a la funcion cambiarValor1 y fuera de ella \$a=$a<br>";

$a=100;
cambiarValor3($a);
echo "Despues de llamar a la funcion cambiarValor3 y fuera de ella \$a=$a<br>";

$a=100;
cambiarValor4();
echo "Despues de llamar a la funcion cambiarValor4 y fuera de ella \$a=$a<br>";



