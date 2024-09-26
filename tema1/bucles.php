<?php
//1.- Bucle for
for($i=0; $i<10; $i++){
    echo "Saludo $i<br>\n";
}
echo "<hr>";
for($i=1; $i<=10; $i++){
    echo "Saludo dos $i<br>\n";
}
//------------------------------------------------
$a=4;
$a=$a+2;   //$a+=2;
$numero=34;
$numero=$numero-56; // $numero-=56;
$numero=$numero*3; // $numero*=3;
//--------------------------------------------------------------------
echo "<hr>";
for($num=0; $num<100; $num+=5){
    echo "$num, ";
}
//------------------------------------------------------------
echo "<hr>";
for($i=1; $i<=100; $i++){
    if(($i%2)!=0){
        echo "$i, ";
    }else{
        echo "X, ";
    }
}
//----------------------------------------------------------------
echo "<hr>";
$numero=13;
$cont=0;
echo "Los divisores de $numero son:<br>";
for($i=1; $i<=$numero; $i++){
    if(($numero%$i)==0){
        echo "$i, ";
        $cont++;
    }
}
echo "<br>$numero tiene un total $cont divisores";
echo "<br><hr><br>";
//Algortimo para ver si un numero es o no primo
$numero=130;
$cont=0;
for($i=1; $i<=$numero; $i++){
    if($numero%$i==0){
        $cont++;
    }
}
if($cont==2){
    echo "El número: $numero es PRIMO";
}else{
    echo "El número: $numero NO es PRIMO";
}
//Algortio anterior mejorado
$numero=19;
$flag=true;
for($i=2; $i<$numero; $i++){
    if($numero%$i==0){
        $flag=false;
        break;
    }
}
if($flag){
    echo "<br>El número $numero ES primo";
}else{
    echo "<br>El número $numero NO ES primo";
}
//--------------------------------------------------------------------------
//2.- Bucle while
echo "<hr>";
$numero=0;
while($numero<100){
    echo "$numero, ";
    $numero+=5;
}
//---------------------
echo "<hr>";
$a=4;
while(true){
    echo "$a, ";
    $a++;
    if($a>10) break;
}
echo "<hr>";
echo "ultimo: <br>";
$num=12;
while($num>100){ //nunca entra en este while pq 12 NO es mayor que 100
    echo "$num, ";
    $num++;
}
// 3.- Bucle do while()
echo "<hr>";
$numero=0;
do{
    echo "$numero, ";
    $numero+=10;
}while($numero<100);

echo "<hr>";
echo "ultimo intento: <br>";
$num=12;
do{
    echo "$num, ";
    $num++;
}while($num>100);
