<?php
require_once "../../class/Modulo.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];


if($cancelar==true){
    header("Location:listado.php?");
    exit;
}

$idModulo=$_POST['IdModulo'];
$nombre=ucfirst($_POST['Modulo']);

$directorio=str_replace(" ", "_", strtolower($nombre));


#COMPRUEBA LAS CANTIDADES MINIMAS DE DIGITOS QUE DEBE CONTENER
if (strlen($nombre) < 3 ){

    header("Location:listado.php?mj=".ERROR_LONGITUD_NAME_CODE);
    exit;
}

if((!preg_match("/^[a-zA-Z_ ]*$/",$nombre))){
    header("Location:listado.php?mj=assssd");
    exit;
};




$modulo=new Modulo();
$modulo->setIdModulo($idModulo);
$modulo->setNombre($nombre);
$modulo->setDirectorio($directorio);

$modulo->actualizarModulo();

if ($modulo){
    header("Location:listado.php?mj=".CORRECT_UPDATE_CODE);
}

?>