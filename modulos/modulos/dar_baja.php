<?php
require_once "../../class/Modulo.php";
require_once "../../configs.php";

if (isset($_GET['idModulo'])):
    
    $idModulo=$_GET["idModulo"];
    Modulo::eliminar($idModulo);
    
    header("Location:listado.php?mj=".CORRECT_DELETE_CODE);
    exit;
endif;



$idModulo=$_GET["id"];
$idPerfil=$_GET["idPerfil"];

Modulo::eliminarRelacionModuloPerfil($idPerfil,$idModulo);

header("Location:listado_por_perfil.php?mj=".CORRECT_DELETE_CODE."&idPerfil=".$idPerfil);


?>