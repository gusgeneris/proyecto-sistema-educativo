<?php
require_once "../../class/Modulo.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

$moduloDescripcion=ucfirst($_POST["Modulo"]);

$directorio=str_replace(" ", "_", strtolower($moduloDescripcion));


if($cancelar==true){
    header("Location:listado_por_perfil.php?idPerfil=".$idPerfil);
    exit;
}
$modulo=new Modulo();
$modulo->setNombre($moduloDescripcion);
$modulo->setDirectorio($directorio);
$dato=$modulo->insert();



if  ($dato==1){
    header("Location:listado.php?mj=".CORRECT_INSERT_CODE);
}else{
    header("Location:listado.php?mj=".INCORRECT_INSERT_DATO_DUPLICATE_CODE);
}

?>