<?php
/*
Crea una función buscarEnArray($array, $elemento) que busque un elemento en un array
 y retorne true si lo encuentra, y false si no.
*/

function buscarEnArray($array, $elemento){
    return in_array($elemento, $array);
}

$array=["Almeria", "Valencia", "Madrid"];
$cadena="Valencia";

if(buscarEnArray($array, $cadena)){
    echo "$cadena se encuentra en el array";
}else{
    echo "$cadena NO se encuentra en el array";
}