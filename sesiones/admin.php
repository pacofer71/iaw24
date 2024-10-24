<?php
session_start();
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] != 'admin') {
    header("Location:sitio.php");
    die();
}
$email = $_SESSION['email'];
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

<body class="p-8">
    <h3 class="text-xl text-center">Portal Administrador</h3>
    <p class="mb-8">Usuario: <?= $email ?></p>
    <a href="sitio.php"
        class="font-bold py-2 px-4 rounded-xl bg-blue-500 hover:bg-blue-700 text-white ">PORTAL HOME</a>
    <a href="cerrar.php"
        class="font-bold py-2 px-4 rounded-xl bg-green-500 hover:bg-green-700 text-white ">CERRAR SESION</a>

</body>

</html>