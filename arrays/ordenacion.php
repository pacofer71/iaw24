<?php
//Algunas funciones importantes de arrays
//Metodos de ordenación
$datos = [
    'Zacarias',
    'Ana',
    'Juan',
    'Inés',
    'Pedro'
];
$datosAsociativos = [
    'nombre1' => 'Zacarias',
    'nombre2' => 'Ana',
    'nombre3' => 'Juan',
    'nombre4' => 'Inés',
    'nombre5' => 'Pedro'
];
//Método sort() de ordenación
echo "<center><h3> Método SORT </h3></center>";
echo "Array datos <b>antes</b> de ordenarlo con sort";
var_dump($datos);
echo "<br>Array datos <b>después</b> de ordenarlo con sort";
sort($datos);
var_dump($datos);

echo "<br>Array datosAsociativos <b>antes</b> de ordenarlo con sort";
var_dump($datosAsociativos);
echo "<br>Array datosAsociativos <b>después</b> de ordenarlo con sort";
sort($datosAsociativos);
var_dump($datosAsociativos);
//
$datos = [
    'Zacarias',
    'Ana',
    'Juan',
    'Inés',
    'Pedro'
];
$datosAsociativos = [
    'nombre1' => 'Zacarias',
    'nombre2' => 'Ana',
    'nombre3' => 'Juan',
    'nombre4' => 'Inés',
    'nombre5' => 'Pedro'
];
//Método rsort() de ordenación
echo "<center><h3> Método RSORT </h3></center>";
echo "Array datos <b>antes</b> de ordenarlo con rsort";
var_dump($datos);
echo "<br>Array datos <b>después</b> de ordenarlo con rsort";
rsort($datos);
var_dump($datos);

echo "<br>Array datosAsociativos <b>antes</b> de ordenarlo con rsort";
var_dump($datosAsociativos);
echo "<br>Array datosAsociativos <b>después</b> de ordenarlo con rsort";
rsort($datosAsociativos);
var_dump($datosAsociativos);
//-------------------Metodo asort()
$datos = [
    'Zacarias',
    'Ana',
    'Juan',
    'Inés',
    'Pedro'
];
$datosAsociativos = [
    'nombre1' => 'Zacarias',
    'nombre2' => 'Ana',
    'nombre3' => 'Juan',
    'nombre4' => 'Inés',
    'nombre5' => 'Pedro'
];
//Método asort() de ordenación
echo "<center><h3> Método ASORT </h3></center>";
echo "Array datos <b>antes</b> de ordenarlo con asort";
var_dump($datos);
echo "<br>Array datos <b>después</b> de ordenarlo con asort";
asort($datos);
var_dump($datos);

echo "<br>Array datosAsociativos <b>antes</b> de ordenarlo con asort";
var_dump($datosAsociativos);
echo "<br>Array datosAsociativos <b>después</b> de ordenarlo con asort";
asort($datosAsociativos);
var_dump($datosAsociativos);
//-------------------Metodo arsort()
$datos = [
    'Zacarias',
    'Ana',
    'Juan',
    'Inés',
    'Pedro'
];
$datosAsociativos = [
    'nombre1' => 'Zacarias',
    'nombre2' => 'Ana',
    'nombre3' => 'Juan',
    'nombre4' => 'Inés',
    'nombre5' => 'Pedro'
];
//Método arsort() de ordenación
echo "<center><h3> Método ARSORT </h3></center>";
echo "Array datos <b>antes</b> de ordenarlo con arsort";
var_dump($datos);
echo "<br>Array datos <b>después</b> de ordenarlo con arsort";
arsort($datos);
var_dump($datos);

echo "<br>Array datosAsociativos <b>antes</b> de ordenarlo con arsort";
var_dump($datosAsociativos);
echo "<br>Array datosAsociativos <b>después</b> de ordenarlo con arsort";
arsort($datosAsociativos);
var_dump($datosAsociativos);
//-------------------Metodo ksort()
$datos = [
    'Zacarias',
    'Ana',
    'Juan',
    'Inés',
    'Pedro'
];
$datosAsociativos = [
    'accion' => 'Zacarias',
    'parada' => 'Ana',
    'zen' => 'Juan',
    'barcelona' => 'Inés',
    'sevilla' => 'Pedro'
];
//Método ksort() de ordenación
echo "<center><h3> Método KSORT </h3></center>";
echo "Array datos <b>antes</b> de ordenarlo con ksort";
var_dump($datos);
echo "<br>Array datos <b>después</b> de ordenarlo con ksort";
ksort($datos);
var_dump($datos);

echo "<br>Array datosAsociativos <b>antes</b> de ordenarlo con ksort";
var_dump($datosAsociativos);
echo "<br>Array datosAsociativos <b>después</b> de ordenarlo con ksort";
ksort($datosAsociativos);
var_dump($datosAsociativos);

// Método krsort()
$datos = [
    'Zacarias',
    'Ana',
    'Juan',
    'Inés',
    'Pedro'
];
$datosAsociativos = [
    'accion' => 'Zacarias',
    'parada' => 'Ana',
    'zen' => 'Juan',
    'barcelona' => 'Inés',
    'sevilla' => 'Pedro'
];
//Método krsort() de ordenación
echo "<center><h3> Método KRSORT </h3></center>";
echo "Array datos <b>antes</b> de ordenarlo con krsort";
var_dump($datos);
echo "<br>Array datos <b>después</b> de ordenarlo con ksort";
krsort($datos);
var_dump($datos);

echo "<br>Array datosAsociativos <b>antes</b> de ordenarlo con krsort";
var_dump($datosAsociativos);
echo "<br>Array datosAsociativos <b>después</b> de ordenarlo con krsort";
krsort($datosAsociativos);
var_dump($datosAsociativos);


