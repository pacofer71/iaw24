<?php
require_once __DIR__."/datos.php";
function sanearCadenas($cadena)
{
    return htmlspecialchars(trim($cadena));
}
function longitudValida($cad, $tMin, $tMax)
{
    if (strlen($cad) < $tMin || strlen($cad) > $tMax) {
        $_SESSION['err_username'] = "*** Error el username debe tener entre $tMin y $tMax caracteres";
        return false;
    }
    return true;
}
function emailValido($email) {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['err_email']="*** Error se esperaba un email válido";
        return false;
    }
    return true;
}
function perfilValido($perfil){
    global $perfiles;
    if(!in_array($perfil, $perfiles)){
        $_SESSION['err_perfil']="*** Perfil incorecto o no elegiste ninguno";
        return false;
    }
    return true;
}

function existeCampo($nomCampo, $valor, $llave){
    $q="select id from users where $nomCampo=?";
    $stmt=mysqli_stmt_init($llave);
    mysqli_stmt_prepare($stmt, $q);
    mysqli_stmt_bind_param($stmt, 's', $valor);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $filas=mysqli_stmt_num_rows($stmt);
    mysqli_stmt_close($llave);
    return $filas;
}

function pintarError($nomError){
    if(isset($_SESSION[$nomError])){
        echo "<p class='mt-2 text-red-600 italic text-sm'>{$_SESSION[$nomError]}</p>";
        unset($_SESSION[$nomError]);
    }
}

