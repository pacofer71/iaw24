<?php
session_start();
require __DIR__ . "/../utils/Conexion.php";
$q = "select *from users order by id desc";
$usuarios = mysqli_query($llave, $q);
mysqli_close($llave);
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
    <!-- CDN Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Users</title>
</head>

<body class="p-6 bg-purple-200">
    <h3 class="text-center font-bold text-xl">Listado de Usuarios</h3>
    <div class="w-3/4 mx-auto mt-4">
        <div class="mb-2 flex flex-row-reverse">
            <a href="nuevo.php" class="p-2 rounded-xl font-bold text-white bg-blue-500 hover:bg-blue-700">
                <i class="fas fa-add mr-1"></i>NUEVO
            </a>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NOMBRE
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
                    $color = match (true) {
                        $item['perfil'] == 'Admin' => 'text-red-600',
                        $item['perfil'] == 'Guest' => 'text-green-500',
                        $item['perfil'] == "User" => 'text-blue-500',
                        default => 'text-purple-700'
                    };
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
                        <span class="font-bold $color">{$item['perfil']}</span>
                    </td>
                    <td class="px-6 py-4">
                        $2999
                    </td>
                </tr>
                TXT;
                }
                ?>

            </tbody>
        </table>
    </div>
    <?php
    if (isset($_SESSION['mensaje'])) {
        echo <<<TXT
    <script>
        Swal.fire({
            icon: "success",
            title: "{$_SESSION['mensaje']}",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    TXT;
    }
    unset($_SESSION['mensaje']);
    ?>
</body>

</html>