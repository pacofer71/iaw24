<?php

$misUsuarios = [
    'admin@gmail.com' => ['secret0', 'admin'],
    'user1@gmail.com' => ['passUser1', 'user'],
    'user2@gmail.com' => ['passUser2', 'user'],
];

function sanearCampos($cadena)
{ {
    }
    return htmlspecialchars(trim($cadena));
}
function isEmailValido($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    $_SESSION['errEmail'] = "*** Error se esperaba un email válido";
    return false;
}
function isPasswordOk($pass)
{
    if (strlen($pass) < 5 || strlen($pass) > 12) {
        $_SESSION['errPassword'] = "*** Error, el campo password debe tener entre 5 y 12 caracteres";
        return false;
    }
    return true;
}
function isLoginOk($email, $pass)
{
    global $misUsuarios;
    foreach ($misUsuarios as $correo => $datos) {
        if ($correo == $email) {
            if ($pass == $datos[0]){
                $_SESSION['email']=$email;
                $_SESSION['perfil']=$datos[1];
                return true;
            }
        }
    }
    $_SESSION['errLogin'] = "Error de validación, email o password incorrectos.";
    return false;
}


function pintarError($nombre)
{
    if (isset($_SESSION[$nombre])) {
        echo "<p class='text-red-600 mt-2 italic text-sm'>
                                    {$_SESSION[$nombre]}</p>";
        unset($_SESSION[$nombre]);
    }
}
