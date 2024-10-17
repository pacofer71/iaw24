<?php
//Contar palabras en texto
function contarPalabras($texto){
    $texto=trim($texto);
    $array=explode(" ", $texto);
    return count($array);
}
function contarpalabras2($texto){
    $texto=trim($texto);
    $cont=0;
    for($i=0; $i<strlen($texto); $i++){
        if($texto[$i]==' '){
            $cont++;
        }
    }
    return $cont+1;
}

$texto="En un lugar de la mancha";
echo "El texto: <i>'$texto'</i>, tiene: ".contarPalabras($texto)." palabras<br>";
echo "El texto: <i>'$texto'</i>, tiene: ".contarPalabras2($texto)." palabras<br>";