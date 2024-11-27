<?php
function sanearCadena(string $cadena): string{
    return htmlspecialchars(trim($cadena));
}

function esLongitudCampoValida(string $nomCampo, string $valorCampo,int $lMin,int $lMax): bool{
    if(strlen($valorCampo)<$lMin || strlen($valorCampo)>$lMax){
        $_SESSION["err_$nomCampo"]="*** Error, este valor debe estar comprendido entre $lMin y $lMax";
        return false;
    }
    return true;
}

function esPrecioValido($precio): bool{
    $precio=(float)$precio;
    if($precio<1 || $precio>9999.99){
        $_SESSION['err_precio']="*** Error el precio debe estar entre 1€ y 9999.99€";
        return false;
    }
    return true;
}
function esCategoriaValida($llave, $categoria_id):bool{
    $q="select id from categorias";
    $catagoriasId=mysqli_query($llave, $q);
    $arrayIdCat=[];
    foreach($catagoriasId as $cat){
        $arrayIdCat[]=$cat['id'];
    }
    if(!in_array($categoria_id, $arrayIdCat)){
        $_SESSION['err_categoria_id']="*** Error categoria inválida o no seleccionó ninguna";
        return false;
    }
    return true;
}