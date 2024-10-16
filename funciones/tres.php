<?php
//hacer una función isPrimo() a la que pasaremos un numero entero mayor que cero
//y nos devolvera true si el numero es primo
//false en otro caso, consideraremos a 1 como NO primo
function isPrimo($numero)
{
    if ($numero == 1) return false;
    for ($i = 2; $i < $numero; $i++) {
        if ($numero % $i == 0) return false;
    }
    return true;
}
$num = 1;
if (isPrimo($num)) {
    echo "$num es primo";
} else {
    echo "$num NO es primo";
}

//vamos a impreimir todos los primos ente 1 y 1000
echo "<hr>";
for ($i = 1; $i <= 1000; $i++) {
    if (isPrimo($i)) echo "$i, ";
}
//Hacer una funcion que reciba el numero de filas y el numero de columnas >=5 y <=10
//y me imprima una tabla html de filas x columnas, en cada celda 
//imprimiremos Celda[f][c] donde f será la fila empezando por 0 y c la columna

function pintarTabla($fila, $columna)
{
    $errores = false;
    if ($fila < 5 || $fila > 10 || !is_int($fila)) {
        echo "Error las filas deben ser un numero entero entre 5 y 10<br>";
        $errores = true;
    }
    if ($columna < 5 || $columna > 10 || !is_int($columna)) {
        $errores = true;
        echo "Error las columnas deben ser un numero entero entre 5 y 10<br>";
    }
    if ($errores) return;

    echo "<table border='4' cellpadding='3' align='center'>";
    for ($f = 0; $f < $fila; $f++) {
        echo "<tr>";
        for ($c = 0; $c < $columna; $c++) {
            echo "<td>Celda[$f][$c]</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
echo "<hr>";
pintarTabla(6, 6);
echo "<br>";
pintarTabla(8, 9);
echo "<hr>";
pintarTabla(3, 4);
