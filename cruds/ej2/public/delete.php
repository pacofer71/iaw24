<?php
session_start();
if(!isset($_POST['clave'])){
    header("Location:users.php");
    exit;
}

$id= (int) $_POST['clave'];

if($id<=0){
    header("Location:users.php");
    exit;
}

require __DIR__."/../utils/Conexion.php";
$q="delete from users where id=?";
$stmt=mysqli_stmt_init($llave);
mysqli_stmt_prepare($stmt, $q);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($llave);
$_SESSION['mensaje']="Usuario eliminado.";
header("Location:users.php");
