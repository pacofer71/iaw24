<?php
$numeros = range(5, 20); //me crea un array numerico de a hasta b
var_dump($numeros);
//guardaremos en un array $pares los numeros pares del 0 al 100
$pares = [];
for ($i = 0; $i <= 100; $i += 2) {
    $pares[] = $i;
}
var_dump($pares);
//utilizando $numeros=range(0,100) y recorriéndolo hacer lo mismo que antes
//es decir un array con los numeros pares del 0 al 100
$numeros = range(0, 100);
$pares = [];
foreach ($numeros as $item) {
    if ($item % 2 == 0) {
        $pares[] = $item;
    }
}
echo "<hr>";
var_dump($pares);
//Lo mismo pero con los multiplos de 7
$multiplosSiete = [];
foreach ($numeros as $item) {
    if ($item % 7 == 0) {
        $multiplosSiete[] = $item;
    }
}
echo "<hr>";
var_dump($multiplosSiete);

//------Ahora lo mismo pero con los primos, los primos 0,1 No son primos
echo "<hr>";
$primos = [];
foreach ($numeros as $item) {
    if ($item == 0 || $item == 1) continue;
    $bandera = true;
    for ($i = 2; $i < $item; $i++) {
        if ($item % $i == 0) {
            $bandera = false;
            break;
        }
    }
    if ($bandera) $primos[] = $item;
}
var_dump($primos);
