<?php
/*
Crea una función precioFinal1($precio, $rebaja) 
que reciba un precio original y un porcentaje de rebaja. Calcula y retorna el precio final tras aplicar la rebaja.
*/
function precioFinal1($precio, $rebaja){
    return (1-($rebaja/100))*$precio;
}
$precio=100;
$rebaja=20;
echo "El precio del articulo 
    de $precio € después de una rebaja del $rebaja % es: ".precioFinal1($precio, $rebaja);