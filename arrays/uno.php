<?php
$usuarios=['ana', 'maria', 'juan', 'pedro', 'lucas'];
echo "<br>El tipo de la variable \$usuarios es: ".gettype($usuarios);
//echo $usuarios; No se puede mostrar un array con un echo
echo "<br>";
print_r($usuarios); //solo para arrays
echo "<br>";
var_dump($usuarios); //sirve para cualquier tipo de variable
echo "<br>";
echo $usuarios[0];
$usuarios[1]='Juana Maria';
var_dump($usuarios); 
$usuarios[]="Nuevo Usuario";
var_dump($usuarios);
$usuarios[]="Otro más";
var_dump($usuarios);
echo "El array \$usuarios tiene: ".count($usuarios)." elementos";
for($i=0; $i<count($usuarios); $i++){
    echo "el elemento $i={$usuarios[$i]}<br>";
    //echo "el elemento $i=".$usuarios[$i]."<br>";
}
// No es buena idea recorrer los elementos de un array con un for;
$usuarios[23]="Andrés";
$usuarios[]="Mohamed";
var_dump($usuarios);
//Esto ahora NO funcionara
// for($i=0; $i<count($usuarios); $i++){
//     echo "el elemento $i={$usuarios[$i]}<br>";
//     //echo "el elemento $i=".$usuarios[$i]."<br>";
// }

$usuarios[13]="User13";
var_dump($usuarios);
$usuarios[-67]="User67";
var_dump($usuarios);

$usuarios[]=123;
$usuarios[]=45.67;
$usuarios[]=true;
var_dump($usuarios);

//recorrer arrays de indice numericos
foreach($usuarios as $valor){ //si solo queremos los valores
    echo "$valor<br>";
}
//si ademas queremos los índices
foreach($usuarios as $indice=>$valor){
    echo "El dato: $valor tiene el indice: $indice<br>";
}






