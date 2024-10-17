<?php
/*
Crea una función precioFinal3($precio, $porcentaje, $tipo)
 que reciba un precio original y un porcentaje y un tipo, tipo valdrá -1 si el porcentaje es para rebajar el precio y 1 si es para subirlo. Calcula y retorna el precio final tras aplicar el porcentaje. Filtraremos los valore para dar un mensaje de error.
$precio =>float, mayor que cero
$porcentaje=>float entre 1 y 100
$tipo =>int -1 o 1
*/
function precioFinal3($precio, $porcentaje, $tipo)
{
    if ($precio <= 0 || !is_numeric($precio)) {
        return "Error, el  precio debe ser un número positivo";
    }
    if ($porcentaje < 1 || $porcentaje > 100 || !is_numeric($porcentaje)) {
        return "Error, el porcentaje debe ser un valor entre 1 y 100";
    }
    if (!is_int($tipo) || !in_array($tipo, [-1, 1])) {
        return "Error el tipo debe ser el valor entero 1 o -1";
    }
    //Si estamos aquí los datos son correctos calculemos el precio
    if ($tipo == 1) {
        return (1 + ($porcentaje / 100)) * $precio;
    } else {
        return (1 - ($porcentaje / 100)) * $precio;
    }
}
$tipo = 1;
$precio = 100;
$porcentaje = 20.4;

echo "El precio del articulo 
    de $precio € después de un porcentaje de rebaja/impuesto 
    del $porcentaje % es: " . precioFinal3($precio, $porcentaje, $tipo);
