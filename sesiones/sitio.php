<?php
session_start();
if (!isset($_SESSION['perfil'])) {
    header("Location:uno.php");
    die();
}
$email = $_SESSION['email'];
$perfil = $_SESSION['perfil'];
$color = ($perfil == 'admin') ? 'bg-red-500' : 'bg-blue-200';
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

<body class="<?= $color; ?> p-12">
    <h3 class="text-xl text-center">Portal WEB</h3>
    <p>Usuario: <?= $email ?></p>
    <p>Perfil: <?= $perfil ?></p>

    <div class="mt-8 flex justify-around p-2 border-2 border-white rounded-xl shadow-xl bg-gray-100">
        <?php
        if ($perfil == 'admin') {
            echo <<< TXT
        <a href="admin.php"
            class="font-bold py-2 px-4 rounded-xl bg-red-500 hover:bg-red-700 text-white ">
            PORTAL ADMINISTRADOR
        </a>
        TXT;
        }
        ?>
        <a href="user.php"
            class="font-bold py-2 px-4 rounded-xl bg-blue-500 hover:bg-blue-700 text-white ">PORTAL USUARIO</a>
        <a href="cerrar.php"
            class="font-bold py-2 px-4 rounded-xl bg-green-500 hover:bg-green-700 text-white ">CERRAR SESION</a>
    </div>
</body>

</html>