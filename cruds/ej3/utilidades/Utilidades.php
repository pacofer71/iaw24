<?php

function sanearCadena($cadena)
{
    return htmlspecialchars(trim($cadena));
}
function longitudCadenaValida($nombre, $valor, $lMin, $lMax)
{
    if (strlen($valor) < $lMin  || strlen($valor) > $lMax) {
        $_SESSION["err_$nombre"] = "*** Error el campo $nombre debe tener entre $lMin y $lMax carácteres";
        return false;
    }
    return true;
}
function emailValido($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['err_email'] = "*** Se esperaba un email válido";
        return false;
    }
    return true;
}

function isLoginValido($email, $pass, $llave)
{
    $q = "select perfil, username, pass from users where email=?";
    $stmt = mysqli_stmt_init($llave);
    mysqli_stmt_prepare($stmt, $q);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $perfilDevuelto, $userDevuelto, $passHash);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    if (!$perfilDevuelto) {
        $_SESSION['err_login'] = '*** Email o password incorrectos';
        return false;
    }
    //el email es el de un usuario registrado, comprobamos la contraseña
    if (!password_verify($pass, $passHash)) {
        $_SESSION['err_login'] = '*** Email o password incorrectos';
        return false;
    }
    //Si he llegado aquí el login ha sido válido
    $_SESSION['login'] = [$perfilDevuelto, $userDevuelto, $email];
    return true;
}

function existeCampo($nomCampo, $valorCampo, $llave)
{
    $q = "select id from users where $nomCampo=?";
    $stmt = mysqli_stmt_init($llave);
    mysqli_stmt_prepare($stmt, $q);
    mysqli_stmt_bind_param($stmt, 's', $valorCampo);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $filas = mysqli_stmt_num_rows($stmt);
    mysqli_stmt_close($stmt);
    if ($filas != 0) {
        $_SESSION["err_$nomCampo"] = "*** Error $valorCampo ya está registrado";
    }
    return $filas;
}

function pintarError($nombre)
{
    if (isset($_SESSION[$nombre])) {
        echo "<p class='text-sm text-red-500 mt-2 italic'>{$_SESSION[$nombre]}</p>";
        unset($_SESSION[$nombre]);
    }
}
