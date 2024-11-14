<?php
try{
    $llave=mysqli_connect("127.0.0.1", "user3", "secret0", "crud3");
}catch(Exception $ex){
    die("Error en la comexion, mensaje de error:".$ex->getMessage());
}