<?php
    session_start();
    require __DIR__."/../utilidades/conexion.php";
    require __DIR__."/../utilidades/validaciones.php";

    $q="select id, nombre from categorias order by nombre";
    $categorias=mysqli_query($llave, $q);
    if(isset($_POST['nombre'])){
        $nombre=sanearCadena($_POST['nombre']);
        $descripcion=sanearCadena($_POST['descripcion']);
        $precio=sanearCadena($_POST['precio']);
        $categoria_id=sanearCadena($_POST['categoria_id']);

        $errores=false;
        if(!esLongitudCampoValida('nombre', $nombre, 5, 60)){
            $errores=true;
        }else{
            if(!esNombreUnico($llave, $nombre)){
                $errores=true;
            }
        }
        if(!esLongitudCampoValida('descripcion', $descripcion, 10, 150)){
            $errores=true;
        }
        if(!esPrecioValido($precio)){
            $errores=true;
        }
        if(!esCategoriaValida($llave, $categoria_id)){
            $errores=true;
        }
        if($errores){
            header("Location:nuevo.php");
            exit;
        }
        //si estamos aqui todo correcto vamos a guardar el articulo
        $q="insert into articulos(nombre, descripcion, categoria_id, precio) values(?,?,?,?)";
        $stmt=mysqli_stmt_init($llave);
        mysqli_stmt_prepare($stmt, $q);
        mysqli_stmt_bind_param($stmt, 'ssid', $nombre, $descripcion, $categoria_id, $precio);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($llave);
        $_SESSION['mensaje']="Se guardó el artículo";
        header("Location:articulos.php");
        exit;



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
    <!-- CDN Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>nuevo</title>
</head>

<body class="p-6 bg-purple-200">
    <h3 class="text-center font-bold text-xl">Crear Artículo</h3>
    <div class="w-1/2 mx-auto p-4 rounded-xl shadow-xl border-2 border-black">
    <form action="nuevo.php" method="POST">
        <!-- Campo de nombre de artículo -->
        <div>
            <label for="nombre" class="block text-gray-600 mb-1">Nombre del artículo</label>
            <div class="relative">
                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 pl-10"
                    placeholder="Nombre del artículo">
                <i class="fas fa-tag absolute left-3 top-2.5 text-gray-400"></i>
            </div>
            <?php
                pintarError('err_nombre');
            ?>
        </div>

        <!-- Campo de descripción -->
        <div>
            <label for="descripcion" class="block text-gray-600 mb-1">Descripción</label>
            <textarea
                id="descripcion"
                name="descripcion"
                rows="3"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2"
                placeholder="Descripción del artículo"></textarea>
                <?php
                pintarError('err_descripcion');
            ?>
        </div>

        <!-- Campo de precio -->
        <div>
            <label for="precio" class="block text-gray-600 mb-1">Precio</label>
            <div class="relative">
                <input
                    type="number"
                    id="precio"
                    name="precio"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 pl-10"
                    placeholder="0.00">
                <i class="fas fa-euro-sign absolute left-3 top-2.5 text-gray-400"></i>
            </div>
            <?php
                pintarError('err_precio');
            ?>
        </div>

        <!-- Campo de categoría -->
        <div>
            <label for="categoria" class="block text-gray-600 mb-1">Categoría</label>
            <div class="relative">
                <select
                    id="categoria"
                    name="categoria_id"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 pl-10">
                    <option value="">Selecciona una categoría</option>
                    <!-- Agrega más opciones aquí -->
                     <?php foreach($categorias as $categoria): ?>
                        <option value="<?= $categoria['id']; ?>"><?= $categoria['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
                <i class="fas fa-list-ul absolute left-3 top-2.5 text-gray-400"></i>
            </div>
            <?php
                pintarError('err_categoria_id');
            ?>
        </div>

        <!-- Botones -->
        <div class="flex justify-between items-center mt-6">
            <button
                type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 flex items-center">
                <i class="fas fa-paper-plane mr-2"></i> Enviar
            </button>
            <button
                type="reset"
                class="bg-gray-500 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-600 flex items-center">
                <i class="fas fa-undo mr-2"></i> Restablecer
            </button>
            <a
                href="articulos.php"
                class="bg-red-500 text-white px-4 py-2 rounded-lg shadow hover:bg-red-600 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Volver
            </a>
        </div>
    </form>
    </div>
</body>

</html>