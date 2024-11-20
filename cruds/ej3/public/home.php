<?php
session_start();
if (isset($_SESSION['login'])) {
    $perfil = $_SESSION['login'][0];
    $username = $_SESSION['login'][1];
}
require __DIR__ . "/../utilidades/Conexion.php";
$q = "select * from users order by email";
$usuarios = mysqli_query($llave, $q);
mysqli_close($llave);

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

<body class="bg-green-200 p-4">
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
            <a href="https://flowbite.com" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">HOME</span>
            </a>
            <div class="flex items-center space-x-6 rtl:space-x-reverse">

                <?php
                if (!isset($_SESSION['login'])) {
                    echo <<<TXT
                    <a href="register.php" class="text-sm  text-green-600 dark:text-green-500 hover:underline">Register</a>
                    <a href="login.php" class="text-sm  text-blue-600 dark:text-blue-500 hover:underline">Login</a>
                    TXT;
                } else {
                    echo <<<TXT
                    <p class="px-4 py-1 rounded-xl bg-gray-200 border-2 border-black">{$_SESSION['login'][1]}&nbsp;&lt;{$_SESSION['login'][2]}&gt;</p>
                    <a href="update.php?user=$username" class="font-bold text-white block p-2 rounded-xl mx-2 bg-green-400">EDITAR</a>
                    <a href="cerrarSesion.php" class="text-sm  text-red-600 dark:text-red-500 hover:underline">Cerrar Sesión</a>
                    TXT;
                }
                ?>
            </div>
        </div>
    </nav>
    <!-- Fin Barra navegacion -->


    <div class="mt-4 w-3/4 mx-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        USERNAME
                    </th>
                    <th scope="col" class="px-6 py-3">
                        EMAIL
                    </th>
                    <th scope="col" class="px-6 py-3">
                        PERFIL
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ACCIONES
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($usuarios as $item) {
                    $boton = (isset($_SESSION['login']) && $item['username'] == $_SESSION['login'][1])
                        ? "disabled" : "";
                    $contenido = (isset($perfil) && $perfil == 'Admin') ?
                        "<form method='POST' action='borrar.php'>
                        <input type='hidden' name='id' value='{$item['id']}' />
                        <button type='submit' $boton><i class='fas fa-trash'></i></button>
                    </form>" :
                        "NO DISPONIBLE";
                    echo <<<TXT
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                    {$item['id']}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {$item['username']}
                    </th>
                    <td class="px-6 py-4">
                        {$item['email']}
                    </td>
                    <td class="px-6 py-4">
                        {$item['perfil']}
                    </td>
                    <td class="px-6 py-4">
                        $contenido
                    </td>
                </tr>
                TXT;
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>