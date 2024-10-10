<?php
    require "utilidades.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-color:silver">
    <h2>
        <center>Formularios</center>
    </h2>
    <form method="POST" action="action2.php">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="name" placeholder="Tu nombre..." />
        <br>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Tu correo..." />
        <br>
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="pass" placeholder="Tu contraseña..." />
        <br>
        <label for="provs">Provincias</label><br>
        <select name="provincias" id="provs">
            <option>Selecciona una provincia</option>
            <?php
            foreach ($provincias as $item) {
                echo "<option>$item</option>";
            }
            ?>
        </select>
        <br>
        <b>Rango de edad</b><br>
        <?php
        foreach($rangoEdad as $item){
            echo <<< TXT
            <input type="radio" value="$item" name="rango" id="$item">
            <label for="$item">$item</label><br>
            TXT;
        }
        ?>
        <b>Marca tus aficiones</b><br>
        <?php
        foreach ($aficiones as $item) {
            echo <<< TXT
        <input id="$item" type='checkbox' name="aficiones[]" value="$item">
        <label for="$item">$item</label><br>
        TXT;
        }
        ?>


        <br><br>
        <input type="submit" value="Enviar" />&nbsp;&nbsp;
        <input type="reset" />
    </form>
</body>

</html>