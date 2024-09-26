<?php
$numero = 15;
echo "<table border='4' align='center'>";
for ($i = 1; $i <= $numero; $i++) {
    echo "<tr>";
    echo "<td>$numero</td>";
    echo "<td>X</td>";
    echo "<td>$i</td>";
    echo "<td>=</td>";
    echo "<td>" . $numero * $i . "</td>";
    echo "</tr>";
}
echo "</table>";
//---------------------------------------------------------------------
//ejercicio donde dado un número mayor que 1000 guardado en una
//variable mostraremos todos los promos desde 2 hasta ese número, es decir
//los numeros primos menores al número dado
$numero = 2340;
echo "<hr><b>Los números primos entre 2 y $numero son:</b><br>";
for ($candidato = 2; $candidato <= $numero; $candidato++) {
    $flag = true;
    for ($i = 2; $i < $candidato; $i++) {
        if ($candidato % $i == 0) {
            $flag = false;
            break;
        }
    }
    if ($flag) echo "$candidato, ";
}
//Ejercicio Guardaremos en una variable filas un numero mayor que cinco,
//en otra variable columnas otro numero mayor que 5 y menor que 15
//mostraremos  una tabla html de filasxcolumnas los numeros desde 1 a filasxcolumnas
$filas = 6;
$columnas = 12;
echo "<hr>";
echo "<h2><center>Tabla de $filas X $columnas </center></h2>";
$cont = 1;
echo "<table align='center' cellpading='10' border='2'>";
for ($f = 0; $f < $filas; $f++) {
    $color = ($f % 2 == 0) ? 'aqua' : 'silver';
    /*
    if($f%2==0){
        $color='aqua';
    }else{
        $color='silver';
    }
    */
    echo "<tr style='background-color:$color'>";
    for ($c = 0; $c < $columnas; $c++) {
        echo "<td>" . $cont++ . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

//Ejercicio volveremos a hacer una tabla de $filas x $columnas como antes
//volveremos a mostrar los numeros desde 1 a $filas x $columnas
//pero ahora a los números primos les pondré la celda roja
//el 1 NO lo consideramos primo
$filas = 8;
$columnas = 12;
echo "<hr>";
echo "<h2><center>Tabla de $filas X $columnas </center></h2>";
$cont = 0;
echo "<table align='center' cellpading='10' border='2'>";
for ($f = 0; $f < $filas; $f++) {
    echo "<tr>";
    for ($c = 0; $c < $columnas; $c++) {
        $cont++;
        $flag = true;
        for ($i = 2; $i < $cont; $i++) {
            if ($cont % $i == 0) {
                $flag = false;
                break;
            }
        }
        $color = ($flag && $cont != 1) ? 'red' : 'white';
        echo "<td style='background-color:$color'>" . $cont . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
// Ejercicio pintaremos un tablero de ajedrez en una tabla html
echo "<h2><center>Tablero de Ajedrez </center></h2>";
$filas = 8;
$columnas = 8;
echo "<table align='center' cellpading='10' border='2'>";

for ($f = 0; $f < $filas; $f++) {
    echo "<tr>";
    for ($c = 0; $c < $columnas; $c++) {
        $color=(($f+$c)%2==0) ? 'white' : 'black';
        echo "<td style='background-color:$color'> &nbsp;&nbsp;&nbsp;&nbsp; </td>";
    }
    echo "</tr>";
}
echo "</table>";
//Ejercicio dado dos numeros num1>1000 y num2>2000 mostraremos y contaremos todos
//los múltiplos de 13 entre num1 y  num2, ambos incluidos
$num1=1500;
$num2=2000;
$cont=0;
echo "<h2><center>Multiplos de 13 entre $num1 y $num2</center></h2>";
for($i=$num1; $i<=$num2; $i++){
    if($i%13==0){
        echo "$i, ";
        $cont++;
    }
}
echo "<br>Hay un total de <b>$cont</b> multiplos de 13";

//Ejercicio: Dada un variable num1 mayor que 1000 
//y una cantidad mayor que 5
//mostraremos dicha cantidad de numeros multiplos de 13
// a partir de num
$num=1500;
$cant=5;
echo "<h2><center>$cant primeros multiplos de 13 a partir de $num</center></h2>";
do{
    if($num%13==0){
        echo "$num, ";
        $cant--;
    }
    $num++;
}while($cant>0);
