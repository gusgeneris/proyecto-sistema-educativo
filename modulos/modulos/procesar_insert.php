<?php
require_once "../../class/Modulo.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];
$idPerfil=$_POST["idPerfil"];

if($cancelar==true){
    header("Location:listado.php?idPerfil=".$idPerfil);
    exit;
}

foreach ($_POST["check_lista"] as $idModulo){
    $modulo=new Modulo();
    $modulo->setIdModulo($idModulo);
    $modulo->asignarModuloAPerfil($idPerfil);
  
}

if  ($modulo){
    header("Location:listado.php?mj=".CORRECT_INSERT_CODE."&idPerfil=".$idPerfil);
}

?>