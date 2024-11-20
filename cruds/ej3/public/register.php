<?php
//echo password_hash("secret0", PASSWORD_BCRYPT);
//die();
session_start();
require __DIR__ . "/../utilidades/Utilidades.php";
require __DIR__ . "/../utilidades/Conexion.php";

if (isset($_POST['email'])) {
    $email = sanearCadena($_POST['email']);
    $pass = sanearCadena($_POST['pass']);
    $username = sanearCadena($_POST['username']);

    $errores = false;
    if (!emailValido($email)) {
        $errores = true;
    } else {
        if (existeCampo('email', $email, $llave)) {
            $errores = true;
        }
    }
    if (!longitudCadenaValida('pass', $pass, 5, 10)) {
        $errores = true;
    }
    if (!longitudCadenaValida('username', $username, 5, 12)) {
        $errores = true;
    } else {
        if (existeCampo('username', $username, $llave)) {
            $errores = true;
        }
    }

    if ($errores) {
        header("Location:register.php");
        exit;
    }    //todo está correcto procedemos a insertar al usuario
    $passHaseada = password_hash($pass, PASSWORD_BCRYPT);
    $q = "insert into users(username, email, pass, perfil) values(?, ?, ?, 'User')";
    $stmt = mysqli_stmt_init($llave);
    mysqli_stmt_prepare($stmt, $q);
    mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $passHaseada);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($llave);
    //inicio sesion al usaurio nuevo 
    $_SESSION['login'] = ['User', $username, $email];
    header("Location:home.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN Tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CDN FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CDN Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>

<body class="bg-green-200">
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Registrarse
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="register.php" method="POST">
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your username</label>
                            <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your username..." />
                            <?php
                            pintarError('err_username');
                            ?>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" />
                            <?php
                            pintarError('err_email');
                            ?>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="pass" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            <?php
                            pintarError('err_pass');
                            pintarError('err_login');
                            ?>
                        </div>

                        <button type="submit" class="w-full text-white bg-blue-400 hover:bg-blue-700  font-medium rounded-lg text-sm px-5 py-2.5 text-center">Registrarse</button>
                        <a href="home.php" class="block w-full text-white bg-green-400 hover:bg-green-700  font-medium rounded-lg text-sm px-5 py-2.5 text-center">Home</a>

                    </form>

                </div>
            </div>
        </div>
    </section>

</body>

</html>