<?php
if(!isset($_POST['idArt'])){
    header("Location:uno.php");
    exit();
}
$id=(int) $_POST['idArt'];
if($id<=0){
    header("Location:uno.php");
    exit();
}
require __DIR__."/../utilidades/conexion.php";
$q="delete from articulos where id=?";
$stmt=mysqli_stmt_init($llave);
mysqli_stmt_prepare($stmt, $q);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($llave);
header("Location:uno.php");