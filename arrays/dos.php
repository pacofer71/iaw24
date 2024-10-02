<?php
$numeros=range(5,20); //me crea un array numerico de a hasta b
var_dump($numeros);
//guardaremos en un array $pares los numeros pares del 0 al 100
$pares=[];
for($i=0; $i<=100; $i+=2){
    $pares[]=$i;
}
var_dump($pares);
//utilizando $numeros=range(0,100) y recorriéndolo hacer lo mismo que antes
//es decir un array con los numeros pares del 0 al 100