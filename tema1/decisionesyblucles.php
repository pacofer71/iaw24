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
        $num2=45;
        echo "<hr>";
        //quiero mostrar los numeros ordenados, es decir 1 < 45 en este caso
        //y si son igualoes 12=12
        if($num1<$num2){
            echo $num1." < ". $num2;
        }elseif($num1==$num2){
            echo "$num1=$num2";
        }else{
            echo "$num2 < $num1";
        }
        //-------------------------
        $a=45.0;
        $b=45;
        if($a==$b){  // el operador == solo compara valores
            echo "<br>Las variables son iguales";
        }else{
            echo "<br>Las variables NO son iguales";
        }
        echo "<hr>";
        if($a===$b){  // el operador === compara valor y tipo
            echo "<br>Las variables son iguales";
        }else{
            echo "<br>Las variables NO son iguales";
        }
        //--------------------
        echo "<hr>";
        $comportamiento="Bueno";
        $tareas="Si";
        //CASO 1: Si el comportamiento ha sido bueno y ha hecho las tareas va al cine, si no NO
        if($comportamiento=="Bueno" && $tareas=="Si"){
            echo "Puedes Ir al Cine";
        }else{
            echo "NO puedes ir al cine";
        }
        
        echo "<hr>";
        $comportamiento="Malo";
        $tareas="No";
        //CASO 2: si el comportamiento ha sido bueno o ha hecho las tareas va al cine
        if($comportamiento=="Bueno" || $tareas=="Si"){
            echo "Puedes Ir al Cine";
        }else{
            echo "NO puedes ir al cine";
        }
        //---------------------- Negacion lógica !
        // Boolean true false
        $valor=true;  //siemre sin comillas simples o doble
        echo "<br>";
        echo "El tipo de \$valor es ".gettype($valor). " y el valor es $valor";

        //-------------------------------
        echo "<hr>";
        $valor = (14>4);
        echo "El tipo de \$valor es ".gettype($valor). " y el valor es $valor";
        //----------------------------------------------------
        $valor=false;
        if(!$valor){  // if($valor==true){......}
            echo "<br>Es cierto";
        }else{
            echo "<br>NO es cierto";
        }
        //-------------------------
        $num=56.90;
        if(!is_integer($num)){
            echo "<br>Es NO entero";
        }else{
            echo "<br>Si lo es";
        }
        //--------------------------------------------
        $num=56;
        $num1=45;
        if($num==$num1){
            echo "<br> Los numeros son iguales";
        }else{
            echo "<br> Los numeros NO son iguales";
        }
        //--------------------------------------------------
        if(0.00009){
            echo "<br>Verdadero";
        }else{
            echo "<br>FALSO";
        }




   ?> 
</body>
</html>