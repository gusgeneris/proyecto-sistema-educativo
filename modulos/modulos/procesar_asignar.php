<?php
require_once "../../class/Modulo.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];
$idPerfil=$_POST["idPerfil"];


if($cancelar==true){
    header("Location:listado_por_perfil.php?idPerfil=".$idPerfil);
    exit;
}
$modulo=new Modulo();
$modulo->eliminarTodaRelacionPerfiles($idPerfil);

foreach ($_POST["check_lista"] as $idModulo){
    
    $modulo->setIdModulo($idModulo);
    $modulo->asignarModuloAPerfil($idPerfil);
  
}

if  ($modulo){
    header("Location:listado_por_perfil.php?mj=".CORRECT_INSERT_CODE."&idPerfil=".$idPerfil);
}

?>