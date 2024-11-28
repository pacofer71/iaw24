<?php
session_start();
require __DIR__ . "/../utilidades/conexion.php";
$q = "select articulos.*, categorias.nombre as nomcat, color from articulos, categorias where categoria_id=categorias.id order by nomcat";
$articulos = mysqli_query($llave, $q);
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
    <title>articulos</title>
</head>

<body class="p-6 bg-purple-200">
    <h3 class="text-center font-bold text-xl">Listado de Artículos</h3>
    <!-- Tabla con los articulos -->


    <div class="w-3/4 mx-auto mt-2">
        <div class="mb-4">
            <a href="nuevo.php" class="p-2 rounded-xl bg-green-600 hover:bg-green-800 font-bold text-white">
                <i class='fas fa-add mr-2'></i>Nuevo
            </a>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        NOMBRE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        DESCRIPCIÓN
                    </th>
                    <th scope="col" class="px-6 py-3">
                        CATEGORIA
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
                <?php foreach ($articulos as $item): ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $item['nombre'] ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $item['descripcion'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <p
                                class="p-1 rounded-xl border-2 border-black text-center font-bold text-white"
                                style="background-color:<?= $item['color'] ?>">
                                <?= $item['nomcat'] ?>
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <?= $item['precio'] ?> €
                        </td>
                        <td class="px-6 py-4">
                            <form action="delete.php" method="POST">
                                <a href="update.php?id=<?= $item['id'] ?>">
                                    <i class="fas fa-edit text-green-500"></i>
                                </a>
                                <input type='hidden' name='codigo' value="<?= $item['id'] ?>" />
                                <button type='submit'>
                                    <i class="fas fa-trash text-red-600"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php if (isset($_SESSION['mensaje'])): ?>
        <script>
            Swal.fire({
                icon: "success",
                title: "<?= $_SESSION['mensaje']; ?>",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    <?php
        unset($_SESSION['mensaje']);
    endif;
    ?>
</body>

</html>