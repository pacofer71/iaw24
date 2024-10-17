<?php
/*
Crea una función 
longitudCadena($cadena) que reciba una cadena y retorne su longitud.
*/

function longitudCadena($cadena){
    return strlen($cadena);
}

$texto="Hola Mundo";
echo "La longitud de <i>'$texto'</i> es:".longitudCadena($texto);