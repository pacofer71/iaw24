<?php
//1.-Contador Ascendente: Escribe un bucle for que imprima los números del 1 al 10.
echo "<h2><center>Ejercicio 1</center></h2>";
for ($i = 1; $i <= 10; $i++) {
    echo "$i, ";
}
//2.-Contador Descendente: Escribe un bucle for que imprima los números del 10 al 1.
echo "<h2><center>Ejercicio 2</center></h2>";
for ($i = 10; $i >= 1; $i--) {
    echo "$i, ";
}
//3.-Tabla de Multiplicar: Crea un bucle for que genere la tabla de multiplicar del 5.
echo "<h2><center>Ejercicio 3</center></h2>";
for ($i = 1; $i <= 10; $i++) {
    echo "5 x $i = " . (5 * $i) . "<br>";
}
//4.-Suma de Números: Escribe un bucle for que sume los números del 1 al 100 y muestre el resultado.
echo "<h2><center>Ejercicio 4</center></h2>";
$suma = 0;
for ($i = 1; $i <= 100; $i++) {
    $suma = $suma + $i; //$suma+=$i;
}
echo "La suma es: $suma";
//5.-Contador Ascendente (while): Usa un bucle while para imprimir los números del 1 al 10.
echo "<h2><center>Ejercicio 5</center></h2>";
$num = 1;
while ($num <= 10) {
    echo $num++ . ", ";
}
//6.-Contador Descendente (while): Usa un bucle while para imprimir los números del 10 al 1.
echo "<h2><center>Ejercicio 6</center></h2>";
$num = 10;
while ($num >= 1) {
    echo $num-- . ", ";
}
//7.-Suma de Números (while): Escribe un bucle while que sume los números del 1 al 100 y muestre el resultado.
echo "<h2><center>Ejercicio 7</center></h2>";
$suma = 0;
$numero = 1;
while ($numero <= 100) {
    $suma += $numero;
    $numero++;
}
echo "<br>La suma es :$suma";

//8.-Contador Ascendente (do while): Escribe un bucle do while que imprima los números del 1 al 10.
echo "<h2><center>Ejercicio 8</center></h2>";
$num = 1;
do {
    echo $num++ . ", ";
} while ($num <= 10);
//9.-Contador Descendente (do while): Escribe un bucle do while que imprima los números del 10 al 1.
echo "<h2><center>Ejercicio 9</center></h2>";
$num = 10;
do {
    echo $num-- . ", ";
} while ($num >= 1);
//10.-Sumar primeros $cantidad numeros pares, bucle para sumar los primeros $cantidad numeros pares
echo "<h2><center>Ejercicio 10</center></h2>";
$cantidad = 15;
$suma = 0;
for ($i = 2; $i <= $cantidad * 2; $i += 2) {
    $suma += $i;
}
echo "<br>La suma de los primeros $cantidad pares es: $suma";

$cantidad = 15;
$suma = 0;
for ($i = 2; $cantidad>0; $i += 2) {
    $suma += $i;
    $cantidad--;
}
echo "<br>La suma de los primero pares es: $suma";
