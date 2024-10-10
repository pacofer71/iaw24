<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-color:olive">
    <h2>
        <center>Formularios</center>
    </h2>
    <form method="POST" action="action1.php">
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
            <option>Almería</option>
            <option>Madrid</option>
            <option>Barcelona</option>
            <option>Sevilla</option>
        </select>
        <br>
        <b>Mayor de edad</b><br>
        <input type="radio" value="SI" name="mayor" id="si">
        <label for="si">SI</label><br>
        <input type="radio" value="NO" name="mayor" id="no" >
        <label for="no">NO</label><br>
        <b>Marca tus aficiones</b><br>

        <input id="cic" type='checkbox' name="aficiones[]" value="Ciclismo">
        <label for="cic">Ciclismo</label><br>
        
        <input id="cin" type='checkbox' name="aficiones[]" value="Cine">
        <label for="cin">Cine</label><br>
        
        <input id="nat" type='checkbox' name="aficiones[]" value="Natacion">
        <label for="nat">Natación</label><br>
        
        <input id="ot" type='checkbox' name="aficiones[]" value="Otras">
        <label for="ot">Otras</label><br>
        
        
        <br><br>
        <input type="submit" value="Enviar" />&nbsp;&nbsp;
        <input type="reset" />
    </form>
</body>

</html>