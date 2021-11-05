<?php
require_once "../../class/Modulo.php";

if (isset($_GET['idModulo'])):
    
    $idModulo=$_GET["idModulo"];
    Modulo::eliminar($idModulo);
    
    header("Location:listado.php?mj=2");
    exit;
endif;



$idModulo=$_GET["id"];
$idPerfil=$_GET["idPerfil"];

Modulo::eliminarRelacionModuloPerfil($idPerfil,$idModulo);

header("Location:listado.php?idPerfil=".$idPerfil);


?>