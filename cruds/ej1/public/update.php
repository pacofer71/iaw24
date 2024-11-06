<?php
session_start();

if (!isset($_GET['idArt'])) {
    header("Location:uno.php");
    exit();
}
$id = (int) $_GET['idArt'];
if ($id <= 0) {
    header("Location:uno.php");
    exit();
}
//recupero los datos del articulo que quiero editar para rellenar los campos del formulario
require __DIR__ . "/../utilidades/conexion.php";
require __DIR__ . "/../utilidades/utilidades.php";

$q = "select * from articulos where id=?";
$stmt = mysqli_stmt_init($llave);
mysqli_stmt_prepare($stmt, $q);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $iDev, $nDevuelto, $dDevuelto, $pDevuelto, $sDevuelto);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);
// si no encuentro el artículo me vuelvo a uno.php
if (!$dDevuelto) {
    mysqli_close($llave);
    header("Location:uno.php");
    die();
}
if (isset($_POST['nombre'])) {
    $nombre = limpiarCadenas($_POST['nombre']);
    $descripcion = limpiarCadenas($_POST['descripcion']);
    $precio = limpiarCadenas($_POST['precio']);
    $stock = limpiarCadenas($_POST['stock']);

    $errores = false;
    if (!islongCadenaOk('nombre', $nombre, 3, 50)) {
        $errores = true;
    }else{
        $q="select * from articulos where nombre=? AND id <> ?";
        $stmt=mysqli_stmt_init($llave);
        mysqli_stmt_prepare($stmt, $q);
        mysqli_stmt_bind_param($stmt, 'si', $nombre, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $filas=mysqli_stmt_num_rows($stmt);
        if($filas>0){
            $errores=true;
            $_SESSION['errnombre']="*** Error el nombre ya existe en la base de datos";
        }
        mysqli_stmt_close($stmt);

    }
    if (!islongCadenaOk('descripcion', $descripcion, 5, 150)) {
        $errores = true;
    }
    if (!isValorNumOk('precio', $precio, 1, 9999.99)) {
        $errores = true;
    }
    if (!isValorNumOk('stock', $stock, 0, 100)) {
        $errores = true;
    }
    if ($errores) {
        header("Location:update.php?idArt=$id");
        die();
    }
    //Si he llegado aquí validaciones correctas
    //actualizare el articulo
    $q="update articulos set nombre=?, descripcion=?, precio=?, stock=? where id=?";
    $stmt=mysqli_stmt_init($llave);
    mysqli_stmt_prepare($stmt, $q);
    mysqli_stmt_bind_param($stmt, 'ssdii', $nombre, $descripcion, $precio, $stock, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($llave);
    header("Location:uno.php");
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
    <title>Articulos</title>
</head>

<body class="px-24 py-12 bg-teal-200">

    <h3 class="text-center font-bold text-xl mb-4">Editar Artículo</h3>
    <div class="p-6 w-3/4 mx-auto rounded-xl border-2 border-black shadow-xl">
        <form method="POST" action="update.php?idArt=<?= $id ?>">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" value="<?= $nDevuelto ?>"
                    name="nombre" id="nombre" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="nombre" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre Artículo</label>
                <?php
                pintarError('errnombre');
                ?>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <textarea name="descripcion" id="descripcion" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "><?= $dDevuelto ?></textarea>
                <label for="descripcion" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Descripción Artículo</label>
                <?php
                pintarError('errdescripcion');
                ?>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="number" value="<?= $pDevuelto ?>"
                        name="precio" id="precio" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " step="0.01" min="0" max="9999.99" />
                    <label for="precio" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Precio Artículo (€)</label>
                    <?php
                    pintarError('errprecio');
                    ?>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="number" value="<?= $sDevuelto ?>"
                        name="stock" id="stock" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min='0' />
                    <label for="stock" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Stock Artículo</label>
                    <?php
                    pintarError('errstock');
                    ?>
                </div>
            </div>
            <div class="mt-4 flex flex-row-reverse">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="fas fa-edit mr-2"></i>EDITAR
                </button>
                <a href="uno.php" class="mr-2 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="fas fa-home mr-2"></i>HOME
                </a>
            </div>


        </form>
    </div>
</body>

</html>