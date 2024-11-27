<?php
try{
    $llave=mysqli_connect('127.0.0.1', 'user3', 'secret0', 'crud4');
}catch(Exception $ex){
    throw new Exception("Error en la conexion, mensaje=".$ex->getMessage());
}