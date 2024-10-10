<?php
// $nombre=$_GET['name'];
// $correo=$_GET['email'];
// $pass=$_GET['pass'];
//var_dump($_POST);
//die();
$nombre=htmlspecialchars(trim($_POST['name']));
$correo=$_POST['email'];
$pass=$_POST['pass'];
$prov=$_POST['provincias'];
// $mayorEdad=$_POST['mayor']; No se debe hacer directamente pq no existe si no selecciono nada
if(isset($_POST['mayor'])){
    //si esto existe es pq hemos elegido una de las opciones
    $esMayor=$_POST['mayor'];
}else{
    $esMayor=-100;
}

if(isset($_POST['aficiones'])){
    $aficiones=$_POST['aficiones'];
}else{
    $aficiones=[];
}
// $aficiones=(isset($_POST['aficiones])) ? $_POST['aficiones'] : [];

echo "Tu nombre es: $nombre, tu email: $correo,
 tu password: $pass, la provincia es: $prov<br>";
 //echo ($mayorEdad=='SI')? "Eres Mayor de edad" : "NO eres mayor de edad";
 if($esMayor==-100){
    echo "<br>Error no has indicado si eres o no mayor de edad!!!";
 }else{
    echo "Mayor de edad=$esMayor";
 }
echo "<br>Las aficiones son: <br>";
 if(count($aficiones)>0){
    foreach($aficiones as $aficion){
        echo "$aficion<br>";
    }
 }else{
    echo "No elegiste o no tienes ninguna afición, deberias hacertelo mirar";
 }
