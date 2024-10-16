<?php
function sumar($a, $b){
    return $a+$b;
}

function saludo($nombre){
    echo "<br>Hola $nombre<br>";
}
function minimo($valor1, $valor2){
    if($valor1<=$valor2){
        return $valor1;
    }
    //seria innecesario poner un else
    return $valor2;
    // return ($valor1<=$valor2) ? $valor1 : $valor2;
}
function maximo($valor1, $valor2){
    if($valor1>=$valor2){
        return $valor1;
    }
    return $valor2;
}



$resultado=sumar(45, 100);
echo "La suma de 45 y 100 es $resultado<br>";
$num1=123;
$num2=45;
echo "La suma de $num1 y $num2 es: ".sumar($num1, $num2);
saludo("Juan Manuel");
$nombre="Lucas Manuel";
saludo($nombre);
//--------------
$num1=500;
$num2=200;
echo "<br>El minimo de $num1 y $num2 es:".minimo($num1, $num2);
echo "<br>El maximo de $num1 y $num2 es:".maximo($num1, $num2);