<?php
session_start();
if(!isset($_GET['clave'])){
    header("Location:users.php");
    exit;
}

$id= (int) $_GET['clave'];

if($id<=0){
    header("Location:users.php");
    exit;
}

require_once __DIR__ . "/../utils/datos.php";
require __DIR__ . "/../utils/utilidades.php";
require __DIR__."/../utils/Conexion.php";
$q="select * from users where id=?";
$stmt=mysqli_stmt_init($llave);
mysqli_stmt_prepare($stmt, $q);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $idDev, $unDev, $emDev, $perDev);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);
if(!$idDev){
    header("Location:users.php");
    exit;
}

if(isset($_POST['username'])){
    $username=sanearCadenas($_POST['username']);
    $email=sanearCadenas($_POST['email']);
    $perfil=(isset($_POST['perfil'])) ? sanearCadenas($_POST['perfil']) : -1;
    $errores=false;
    if(!longitudValida($username, 5, 80)){
        $errores=true;
    }else{
        if(existeCampo('username', $username, $llave, $id)){
            $errores=true;
        }
    }
    if(!emailValido($email)){
        $errores=true;
    }else{
        if(existeCampo('email', $email, $llave, $id)){
            $errores=true;
        }
    }
    if(!perfilValido($perfil)){
        $errores=true;
    }
    if($errores){
        header("Location:update.php?clave=$id");
        exit();
    }
    //si estamos aquí no hay errores, edito el usuario
    $q="update users set username=?, email=?, perfil=? where id=?";
    $stmt=mysqli_stmt_init($llave);
    mysqli_stmt_prepare($stmt, $q);
    mysqli_stmt_bind_param($stmt, 'sssi', $username, $email, $perfil, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($llave);
    $_SESSION['mensaje']="Usuario editado con éxito.";
    header("Location:users.php");


}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN Tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CDN FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Editar</title>
</head>

<body class="p-6 bg-purple-200">
    <h3 class="text-center font-bold text-xl">Editar usuario</h3>
    <div class="w-1/2 mx-auto mt-4 p-4 border-2 border-black rounded-xl shadow-xl">
        <form method="POST" action="update.php?clave=<?=$id ?>">
            <div class="mb-5">
                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                <input type="text" id="username" value="<?=$unDev ?>"
                name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Username..." />
                <?php
                    pintarError('err_username');
                ?>
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" id="email" name="email"  value="<?=$emDev ?>"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Email..." />
                <?php
                    pintarError('err_email');
                ?>
            </div>
            <div class="mb-5">
                <label for="perfil" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perfil</label>
                <div class="flex">
                    <?php
                    foreach ($perfiles as $item) {
                        $cadena=($item==$perDev) ? "checked" : "";
                        echo <<<TXT
                    <div class="flex items-center me-4">
                        <input id="$item" type="radio" $cadena value="$item" name="perfil" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="$item" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">$item</label>
                    </div>
                    TXT;
                    }
                    ?>
                </div>
                <?php
                    pintarError('err_perfil');
                ?>

            </div>
            <div class="mt-4 flex flex-row-reverse">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="fas fa-edit mr-1"></i>EDITAR
                </button>
             
                <a href="users.php" class="mr-2 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="fas fa-home mr-1"></i>HOME
                </a>
            </div>
        </form>
    </div>
</body>

</html>