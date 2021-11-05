<?php
require_once "../../class/Modulo.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

$moduloDescripcion=ucfirst($_POST["Modulo"]);
$directorio=strtolower($moduloDescripcion);


if($cancelar==true){
    header("Location:listado_por_perfil.php?idPerfil=".$idPerfil);
    exit;
}
$modulo=new Modulo();
$modulo->setNombre($moduloDescripcion);
$modulo->setDirectorio($directorio);
$modulo->insert();



if  ($modulo){
    header("Location:listado.php?mj=".CORRECT_INSERT_CODE."&idPerfil=".$idPerfil);
}

?>