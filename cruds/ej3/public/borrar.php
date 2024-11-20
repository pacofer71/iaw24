<?php
session_start();
$id=filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if(!$id || $id<=0){
    header("Location:home.php");
    exit;
}

require __DIR__."/../utilidades/Conexion.php";
$q="delete from users where id=?";
$stmt=mysqli_stmt_init($llave);
mysqli_stmt_prepare($stmt, $q);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($llave);
header("Location:home.php");