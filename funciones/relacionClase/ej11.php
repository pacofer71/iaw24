<?php
/*
Crea una función precioFinal2($precio, $impuesto) que reciba un precio original y un porcentaje de impuesto.
Calcula y retorna el precio final tras aplicar el impuesto.
*/
function precioFinal2($precio, $impuesto){
    return (1+($impuesto/100))*$precio;
}
$precio=100;
$impuesto=21;
echo "El precio del articulo 
    de $precio € después de un impuesto del $impuesto % es: ".precioFinal2($precio, $impuesto);