<?php
/*
Crea una función generarCuadrados($n) que genere y 
retorne un arreglo con los cuadrados de los números del 1 al $n.
*/
function generarCuadrados($n){
    $cuadrados=[];
    for($i=1; $i<=$n; $i++){
        $cuadrados[]=$i*$i;
    }
    return $cuadrados;
}
var_dump(generarCuadrados(4));