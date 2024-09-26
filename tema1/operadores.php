<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $num1=45;
        $num2=35.78;
        $num3=23;
        $res1=$num1+$num2; //sumo entero y decimal
        $res2=$num1+$num3; //sumo dos enteros
        echo "El tipo de \$res1 es ".gettype($res1)." y el valor $res1";
        echo "<br>";
        echo "El tipo de \$res2 es ".gettype($res2)." y el valor $res2";
        //-----------------------------------------------------------
        echo "<hr>";
        $res1=$num1-$num2; //resto entero y decimal
        $res2=$num1-$num3; //resto dos enteros
        echo "El tipo de \$res1 es ".gettype($res1)." y el valor $res1";
        echo "<br>";
        echo "El tipo de \$res2 es ".gettype($res2)." y el valor $res2";
        //-----------------------------------------------------------
        echo "<hr>";
        $res1=$num1*$num2; //mult entero y decimal
        $res2=$num1*$num3; //mult dos enteros
        echo "El tipo de \$res1 es ".gettype($res1)." y el valor $res1";
        echo "<br>";
        echo "El tipo de \$res2 es ".gettype($res2)." y el valor $res2";
         //-----------------------------------------------------------
         echo "<hr>";
         $res1=$num1/$num2; //divido entero y decimal
         $res2=$num1/$num3; //divido dos enteros
         echo "El tipo de \$res1 es ".gettype($res1)." y el valor $res1";
         echo "<br>";
         echo "El tipo de \$res2 es ".gettype($res2)." y el valor $res2";

         echo $num1=8;
         echo $num2=4;
         $div=$num1/$num2;
         echo "<br>";
         echo "El tipo de \$div es ".gettype($div)." y el valor $div";
         ///-----------------------------Operador Modulo
         $a=15;
         $b=4;
         $mod=$a%$b;
         echo "<br>";
         echo "El resto de dividir $a y $b es $mod";
        
    ?>
</body>
</html>