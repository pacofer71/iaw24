<?php
    session_start();
    if(!isset($_SESSION['perfil'])){
        header("Location:uno.php");
        die();
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
<body class="bg-blue-200 p-12">
    <h3 class="text-xl text-center">Portal WEB</h3>
</body>
</html>