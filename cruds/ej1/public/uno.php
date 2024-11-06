<?php
//Vamos a traernos todos los registros de la tabla articulos;
require __DIR__ . "/../utilidades/conexion.php";
// require "./../utilidades/conexion.php";
$q = "select * from articulos order by id desc";
$articulos = mysqli_query($llave, $q);
//Hay que cerrar la conexión SIEMPRE
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
    <title>Articulos</title>
</head>

<body class="px-24 py-12 bg-teal-200">

    <h3 class="text-center font-bold text-xl mb-4">Artículos</h3>
    <div class="flex mb-2 flex flex-row-reverse">
        <a href="nuevo.php" 
        class="px-3 py-1 font-bold rounded-xl bg-blue-500 hover:bg-blue-700 text-white">
           <i class="fas fa-add mr-2"></i>NUEVO
        </a>
    </div>
    <div class="relative overflow-x-auto">
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
                        DESCRIPCIÓN
                    </th>
                    <th scope="col" class="px-6 py-3">
                        STOCK
                    </th>
                    <th scope="col" class="px-6 py-3">
                        PRECIO (€)
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ACCIONES
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($articulos as $item){
                echo <<<TXT
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        {$item['id']}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                         {$item['nombre']}
                    </th>
                    <td class="px-6 py-4">
                         {$item['descripcion']}
                    </td>
                    <td class="px-6 py-4">
                         {$item['stock']}
                    </td>
                    <td class="px-6 py-4">
                         {$item['precio']} €
                    </td>
                    <td class="px-6 py-4">
                        <form action="delete.php" method="POST">
                        <input type="hidden" name="idArt" value="{$item['id']}" />
                        <a href="update.php?idArt={$item['id']}">
                        <i class="fas fa-edit text-green-500 hover:text-xl mr-2"></i>
                        </a>
                        <button type='submit' onclick="return confirm('¿Borrar articulo?');">
                        <i class="fas fa-trash text-red-500 hover:text-xl"></i>
                        </button>
                        </form>
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