<?php
//Arrays asociativos, ahora las claves NO serán númericas
$persona1 = [
    'nombre' => 'Manolo',
    'apellidos' => 'Perez Sanz',
    'email' => 'manolo@email.es',
    'edad' => 34,
    'sueldo' => 1245.67,
];
$persona2 = [
    'nombre' => 'Ana',
    'apellidos' => 'Gil Sanz',
    'email' => 'ana@email.es',
    'edad' => 44,
    'sueldo' => 2245.67,
];
$persona3 = [
    'nombre' => 'Juan',
    'apellidos' => 'Hernandez Lopez',
    'email' => 'juan@email.es',
    'edad' => 54,
    'sueldo' => 1845.67,
];
var_dump($persona1);
echo "El nombre es: {$persona1['nombre']}";
echo "<br>";
echo "El nombre completo es: {$persona1['apellidos']}, {$persona1['nombre']}";
echo "<hr>";
foreach ($persona1 as $k => $v) {
    echo "El campo $k = $v <br>";
}
//---------------------------------------------------------
$empleados = [
    'Empleado 1' => $persona1,
    'Empleado 2' => $persona2,
    'Empleado 3' => $persona3
];
echo "<hr>";
var_dump($empleados);
echo "<hr>";
var_dump($empleados['Empleado 2']);
echo "\n";

echo "<ol>\n";
foreach ($empleados as $clave => $empleado) {
    echo "<li><b>$clave</b></li>\n";
    echo "<ul>\n";
    foreach ($empleado as $campo => $valor) {
        echo "<li>$campo: $valor</li>\n";
    }
    echo "</ul>\n";
}
echo "</ol>\n";

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
$valencia=[
    'Valencia',
    'Alicante',
    'Castellon'
];
$extremadura=[
    'Caceres',
    'Badajoz',
];
$madrid=['Madrid'];

$comunidades=[
    'Andalucia'=>$andalucia,
    'Madrid'=>$madrid,
    'Valencia'=>$valencia,
    'Extremadura'=>$extremadura,
   
];
var_dump($comunidades);

echo "<ol>\n";
foreach ($comunidades as $nombre => $provincias) {
    echo "<li><b>$nombre</b></li>\n";
    echo "<ul>\n";
    foreach ($provincias as $nombreProvincia) {
        echo "<li>$nombreProvincia</li>\n";
    }
    echo "</ul>\n";
}
echo "</ol>\n";

//------------------------------------------
echo "<hr>";
foreach ($comunidades as $nombre => $provincias) {
    echo "<table border='2' align='center'>";
    echo "<tr>";
    echo "<td colspan='".count($provincias)."' align='center'>$nombre</td>";
    echo "</tr>";
    echo "<tr>";
    foreach ($provincias as $nombreProvincia) {
        echo "<td>$nombreProvincia</td>";
    }
    echo "</tr>";
    echo "</table>";
    echo "<br>";
}

