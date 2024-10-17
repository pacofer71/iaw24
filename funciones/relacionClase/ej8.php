<?php
//reemplazarTexto($cadena, $textoBuscado, $reemplazo)

function reemplazarTexto($texto, $textoAbuscar, $textoAreemplazar){
    return str_replace($textoAbuscar, $textoAreemplazar, $texto);
}

function reemplazarTexto2($texto, $textoBuscar, $textoReemplazar){
    $c=explode($textoBuscar, $texto);
    $l=implode($textoReemplazar,$c);
    return $l;
}
$texto="Hola Mundo ¿Bonito? con olas";
echo reemplazarTexto($texto, '?', '!');
echo "<br>";
echo reemplazarTexto2($texto, '?', '!');
