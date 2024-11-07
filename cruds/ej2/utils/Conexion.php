<?php
try{
    $llave=mysqli_connect("127.0.0.1", "user2", "secret0", "crud2");
}catch(Exception $ex){
    die("Error en la conexion, mensaje de error:".$ex->getMessage());
}