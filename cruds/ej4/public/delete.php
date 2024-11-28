<?php
session_start();

$id=filter_input(INPUT_POST, 'codigo', FILTER_VALIDATE_INT);
if(!$id || $id<=0){
    header("Location:articulos.php");
    exit;
}
require __DIR__."/../utilidades/conexion.php";
$q="delete from articulos where id=?";
$stmt=mysqli_stmt_init($llave);
mysqli_stmt_prepare($stmt, $q);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($llave);
$_SESSION['mensaje']='Artículo Borrado.';
header("Location:articulos.php");