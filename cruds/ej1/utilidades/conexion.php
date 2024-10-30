<?php
try{
    $llave=mysqli_connect("127.0.0.1", "usuario", "secret0", "ejemplo1");
}catch(Exception $ex){
    die("Error en la conexión, el mensaje de error es:".$ex->getMessage());
}