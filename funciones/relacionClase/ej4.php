<?php
/*
Crea una función celsiusAFahrenheit($celsius) que convierta una temperatura de Celsius a Fahrenheit. 
Muestra el resultado de convertir 25 grados Celsius.

*/

function celsiusAFahrenheit($celsius){
    return ($celsius * (9/5)) + 32; 
}

echo "25 Grados Celsius serán: ". celsiusAFahrenheit(25)." grados Fahrenheit";