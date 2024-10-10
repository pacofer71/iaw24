<?php
require "utilidades.php";
//Procesamos form2.php
//1.- Recogemos y limpiamos los datos
$nombre=htmlspecialchars(trim($_POST['name']));
$email=htmlspecialchars(trim($_POST['email']));
$pass=htmlspecialchars(trim($_POST['pass']));
$provincia=htmlspecialchars(trim($_POST['provincias']));
$rango=(isset($_POST['rango'])) 
    ? htmlspecialchars(trim($_POST['rango']))
    : -1;
$misAficiones=(isset($_POST['aficiones'])) 
    ? $_POST['aficiones']
    : [];

/*
2.- Vamos a validar los datos en este caso:
    El nombre debe tener al menos 3 caracteres y no mas de 10
    El email debe se un email válido
    La contraseña al menos 5 caracteres y no más de 12
    Se debe haber seleccionado una provincia y esta debe ser válida
    Se debe haber seleccionado un rango de edad y este debe ser válido
    Se debe haber seleccionado una afición y esta debe ser válida

*/
$errores=false;
$mensajeErrores=[];
if(strlen($nombre)<3 || strlen($nombre)>10){
    $errores=true;
    $mensajeErrores[]="
    Error, el campo nombre debe tener entre 3 y 10 caracteres, tu has enviado $nombre";

}
if(strlen($pass)<5 || strlen($pass)>12){
    $errores=true;
    $mensajeErrores[]="Error, el campo password 
    debe tener entre 5 y 12 caracteres, tu has enviado $pass";

}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ //(filter_var(,)==false)
    $errores=true;
    $mensajeErrores[]="Error, el campo email
    debe ser un email válido, tu has enviado $email";
}
if(!in_array($provincia, $provincias)){
    $errores=true;
    $mensajeErrores[]="Error, el campo provincias
    debe ser una provincia válida, tu has enviado $provincia";
}
if($rango==-1){
    $errores=true;
    $mensajeErrores[]="Error, debes seleccionar un rango de edad";
}else{
    if(!in_array($rango, $rangoEdad)){
        $errores=true;
        $mensajeErrores[]="Error han manipulado el rango de edad";
    }
}

if(count($misAficiones)==0){
    $errores=true;
    $mensajeErrores[]="Error, debes seleccionar al menos una afición";
}else{
    foreach($misAficiones as $item){
        if(!in_array($item, $aficiones)){
            $errores=true;
            $mensajeErrores[]="error Intento de hackear aficiones...";
        }
    }
}

if($errores){
    //pinto los errores
    echo "<b>Ha habido errores en las validaciones</b>";
    echo "<ol>";
    foreach($mensajeErrores as $error){
        echo "<li>$error</li>";
    }
    echo "</ol>";
}else{
    //pintar los datos
}


// 3.- Si todo esta correcto pintamos los datos enviados, si no mostramos los errores en una lista