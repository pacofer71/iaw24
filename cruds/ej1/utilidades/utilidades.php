<?php

function limpiarCadenas($cad){
    return htmlspecialchars(trim($cad));
}

function islongCadenaOk($nombre, $valor, $valorMin, $valorMax){
    if(strlen($valor)<$valorMin || strlen($valor)>$valorMax){
        $_SESSION["err".$nombre]="*** Error el campo $nombre debe tener entre $valorMin y $valorMax caracteres";
        return false;
    }
    return true;
}

function isValorNumOk($nombre, $valor, $valorMin, $valorMax){
    if($valor<$valorMin || $valor>$valorMax){
        $_SESSION["err".$nombre]="*** Error el campo $nombre debe estar entre $valorMin y $valorMax";
        return false;
    }
    return true;
}

function pintarError($nombre){
    if(isset($_SESSION[$nombre])){
        echo "<p class='text-red-500 text-sm italic mt-2'>{$_SESSION[$nombre]}</p>";
        unset($_SESSION[$nombre]);
    }
}