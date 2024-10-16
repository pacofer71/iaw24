<?php
if (isset($_POST['email'])) {
    //Hemos enviado el formulario, vamos a procesarlo
    $email = htmlspecialchars(trim($_POST['email']));
    $pass = htmlspecialchars(trim($_POST['pass']));

    $errores = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores = true;
        echo "Error el email es incorrecto!!!!<br>";
    }
    if (strlen($pass) < 5 || strlen($pass) > 10) {
        $errores = true;
        echo "Error la contraseña debe tener entre 5 y 10 caracteres<br>";
    }
    if (!$errores) {
        echo "Los datos son: Email=$email, Password=$pass<br>";
    }
    echo "<a href='form3.php'>Volver a Login</a>";
} else {
    //No hemos enviado el formulario, pintaremos el mismo

?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body style="background-color:silver; padding:12px">
        <h3>
            <center>Formulario Login</center>
        </h3>
        <form method="POST" action="form3.php">
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email" placeholder="Tu email..." /><br><br>

            <label for="password">Password</label><br>
            <input type="password" name="pass" id="password" placeholder="Tu password..." />

            <br><br>
            <input type="submit" value="LOGIN" />&nbsp;&nbsp;
            <input type="reset" value="LIMPIAR" />

        </form>
    </body>

    </html>
<?php
} //esta llave cierra el else de arriba 
?>