<?php
session_start();
require "utilidades.php";
if (isset($_POST['email'])) {

    //Hemos enviado el formulario, vamos a procesarlo
    //echo "Hemos enviado el form";
    $email = sanearCampos($_POST['email']);
    $pass = sanearCampos($_POST['password']);

    //Hacemos las validaciones
    $errores = false;
    if (!isEmailValido($email)) {
        $errores = true;
    }
    if (!isPasswordOk($pass)) {
        $errores = true;
    }
    if ($errores) {
        header("Location:uno.php");
        exit(); //die();
    }
    // Si estoy aquí el email es valido y la pass tiene entre 5 y 12 caracteres
    //veamos si podemos hacer el login
    if (isLoginOk($email, $pass)) {
        header("Location:sitio.php");
        die();
    }
    //si no he hecho login váligo cargo la página 
    header("Location:uno.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN Tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="bg-green-200">
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Sign in to your account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="uno.php" method="POST">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" />
                            <?php
                            pintarError('errEmail');
                            ?>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            <?php
                            pintarError('errPassword');
                            pintarError('errLogin');
                            ?>
                        </div>

                        <button type="submit" class="w-full text-white bg-blue-400 hover:bg-blue-700  font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign in</button>

                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>