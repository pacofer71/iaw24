<?php

session_start();
require __DIR__ . "/../utilidades/Utilidades.php";
require __DIR__ . "/../utilidades/Conexion.php";
if (!isset($_GET['user']) || !isset($_SESSION['login'])) {
    header("Location:home.php");
    die();
}
$user = $_GET['user'];
$perfilUsuario = $_SESSION['login'][0];
//Evitando que un usuario con perfil 'User' edite a otro usuario que no sea el mismo 
if ($perfilUsuario != 'Admin') {
    if ($user != $_SESSION['login'][1]) {
        //echo "<script>alert('intentando editar un usuario que no es el mismo')</script>";
        header("Location:home.php");
        die();
    }
}
//------------Fin de lo anterior

//Recupetamos los datos del usuario para actualizar
$q = "select id, username, email, perfil from users where username=?";
$stmt = mysqli_stmt_init($llave);
mysqli_stmt_prepare($stmt, $q);
mysqli_stmt_bind_param($stmt, 's', $user);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $id, $un, $em, $pf);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);
//--------------------------------------------------------
if (isset($_POST['email'])) {
    $email = sanearCadena($_POST['email']);
    $pass = sanearCadena($_POST['pass']);
    $username = sanearCadena($_POST['username']);
    $perfil = ($perfilUsuario == 'Admin') ? sanearCadena($_POST['perfil']) : "User";

    $errores = false;
    if (!emailValido($email)) {
        $errores = true;
    } else {
        if (existeCampo('email', $email, $llave, $id)) {
            $errores = true;
        }
    }
    if (strlen($pass) != 0 && !longitudCadenaValida('pass', $pass, 5, 10)) {
        $errores = true;
    }
    if (!longitudCadenaValida('username', $username, 5, 12)) {
        $errores = true;
    } else {
        if (existeCampo('username', $username, $llave, $id)) {
            $errores = true;
        }
    }

    if ($errores) {
        header("Location:update.php?user=$user");
        exit;
    }
    //todo está correcto procedemos a actualizar el usuario

    if (strlen($pass) != 0) $passHaseada = password_hash($pass, PASSWORD_BCRYPT);

    $q = (strlen($pass) == 0)  ? "update users set email=?, username=?, perfil=? where id=?"
        : "update users set email=?, username=?, perfil=?, pass=? where id=?";

    $stmt = mysqli_stmt_init($llave);
    mysqli_stmt_prepare($stmt, $q);

    (strlen($pass) == 0) ? mysqli_stmt_bind_param($stmt, 'sssi', $email, $username, $perfil, $id)
        : mysqli_stmt_bind_param($stmt, 'ssssi', $email, $username, $perfil, $passHaseada, $id);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($llave);
    //actualizao la sesion solo si me he editado a mi mismo
    if ($user == $_SESSION['login'][1]) {
        $_SESSION['login'] = [$perfil, $username, $email];
    }
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
                        EDITAR USUARIO
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="update.php?user=<?= $user ?>" method="POST">
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your username</label>
                            <input type="text" name="username" value="<?= $un ?>"
                                id="username" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your username..." />
                            <?php
                            pintarError('err_username');
                            ?>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="text" name="email" value="<?= $em ?>"
                                id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" />
                            <?php
                            pintarError('err_email');
                            ?>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="pass" id="password" placeholder="Your Pass..." class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            <?php
                            pintarError('err_pass');
                            pintarError('err_login');
                            ?>
                        </div>
                        <?php
                        if ($perfilUsuario == 'Admin') {
                            $adminSelected = ($pf == 'Admin') ? "selected" : "";
                            $userSelected = ($pf == 'User') ? "selected" : "";
                            echo <<< TXT
                        <div class="mb-4">
                            <label for="perfil" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perfil</label>
                            <select name="perfil" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option>Selecciona un Perfil</option>
                            <option $adminSelected>Admin</option>
                            <option $userSelected>User</option>
                            </select>
                        </div>
                        TXT;
                        }
                        ?>

                        <button type="submit" class="w-full text-white bg-blue-400 hover:bg-blue-700  font-medium rounded-lg text-sm px-5 py-2.5 text-center">EDITAR</button>
                        <a href="home.php" class="block w-full text-white bg-green-400 hover:bg-green-700  font-medium rounded-lg text-sm px-5 py-2.5 text-center">Home</a>

                    </form>

                </div>
            </div>
        </div>
    </section>

</body>

</html>