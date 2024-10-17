<?php

/*
Crea una función calcularPromedio($array) 
que reciba un array de números y retorne su promedio.
*/
function calcularPromedio($array){
    $suma=0;
    foreach($array as $valor){
        $suma+=$valor;
    }
    return $suma/count($array);
}
$notas=[4,5,6, 3, 7];
echo "El promedio de las notas será: ". calcularPromedio($notas);