<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
         // VARIABLES 
         $nombre="Pedro Juan";
         $apellidos="Gil Gil";
         $userName='usuario56';
         $userPassword="secret0";   //camelCase
         $rebaja="56.78";
         $impuesto=23;
         echo "El nombre es <b>$nombre</b> y los apellidos son <b>$apellidos</b>";
         echo "<br>";
         echo 'El nombre es <b>$nombre</b> y los apellidos son <b>$apellidos</b>';
         echo "<br>";
         echo "El valor de la variable \$nombre es $nombre y el de la variable \$rebaja es $rebaja";
         echo "<br>";
         echo 'El valor de la variable $nombre es '.$nombre.' y el de $rebaja es '.$rebaja; 
         $nombreCompleto=$nombre.' '.$apellidos;
         echo "<br>";
         echo "El nombre completo es: $nombreCompleto";
         echo "<br>";
         $nombreCompleto=$apellidos.", ".$nombre;
         echo "El nombre completo es: $nombreCompleto";
         //--------------------------------------------------------------------------------------------
         echo "<hr>";
         echo "El tipo de la variable \$rebaja es: ".gettype($rebaja);
         // Conversion de tipos o casting
        $numero=45.69;
        echo "<br>";
        echo "El tipo de \$numero es ".gettype($numero)." y el valor $numero";
        $num2=(Int) $numero;
        echo "<br>";
        echo "El tipo de \$num2 es ".gettype($num2)." y el valor $num2";
        $cad1=(String) $numero;
        echo "<br>";
        echo "El tipo de \$cad1 es ".gettype($cad1)." y el valor $cad1";
        //--------------------------------------------------
        $numero=34;
        $num2=(Double) $numero;
        echo "<br>";
        echo "El tipo de \$num2 es ".gettype($num2)." y el valor $num2";
        $cad1=(String) $numero;
        echo "<br>";
        echo "El tipo de \$cad1 es ".gettype($cad1)." y el valor $cad1";
        //-------------------------------------------------------------------
        $nombre="123Manolo";
        echo "<hr>";
        echo "El tipo de \$nombre es ".gettype($nombre)." y el valor $nombre";
        $nom2=(Int) $nombre;
        echo "<br>";
        echo "El tipo de \$nom2 es ".gettype($nom2)." y el valor $nom2";
        
        $nombre="Manolo123";
        echo "<hr>";
        echo "El tipo de \$nombre es ".gettype($nombre)." y el valor $nombre";
        $nom2=(Int) $nombre;
        echo "<br>";
        echo "El tipo de \$nom2 es ".gettype($nom2)." y el valor $nom2";

        //-------------------------------------------------------------------
        echo "<hr><hr>";
        $nombre="123Manolo";
        echo "<hr>";
        echo "El tipo de \$nombre es ".gettype($nombre)." y el valor $nombre";
        $nom2=(Double) $nombre;
        echo "<br>";
        echo "El tipo de \$nom2 es ".gettype($nom2)." y el valor $nom2";
        
        $nombre="Manolo123";
        echo "<hr>";
        echo "El tipo de \$nombre es ".gettype($nombre)." y el valor $nombre";
        $nom2=(Double) $nombre;
        echo "<br>";
        echo "El tipo de \$nom2 es ".gettype($nom2)." y el valor $nom2";







         
    ?>
</body>
</html>