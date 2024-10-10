<?php
//Algunas funciones para trabajar con arrays utiles
$andalucia=[
    'Almería', 
    'Cádiz',
    'Córdoba',
    'Granada',
    'Huelva',
    'Jaen',
    'Málaga',
    'Sevilla'
];

//in_array() me dice si un elemento pertenece o no a un array
$prov="Cádiz";
if(in_array($prov, $andalucia)){
    echo "$prov está en el array";
}else{
    echo "$prov NO está en el array";
}
//-------array_keys() array_values()
$datosAsociativos = [
    'accion' => 'Zacarias',
    'parada' => 'Ana',
    'zen' => 'Juan',
    'barcelona' => 'Inés',
    'sevilla' => 'Pedro'
];
$claves=array_keys($datosAsociativos);
$valores=array_values($datosAsociativos);
var_dump($claves);
var_dump($valores);
//implode()<---solo arrays NO asociativos, y explode()
$cadena=implode(", ", $andalucia);
echo "<br>$cadena";
$usuarios="juan::admin::secret0::/home/juan";
echo "<br>$usuarios";
$arrayUsuarios=explode("::", $usuarios);
var_dump($arrayUsuarios);

// compact();
$nombre="Juan";
$edad=45;
$admin=false;
$datos=compact('nombre', 'edad', 'admin');
var_dump($datos);