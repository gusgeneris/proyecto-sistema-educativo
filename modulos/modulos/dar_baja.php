<?php
require_once "../../class/Modulo.php";
$idModulo=$_GET["id"];
$idPerfil=$_GET["idPerfil"];

Modulo::eliminarRelacionModuloPerfil($idPerfil,$idModulo);

header("Location:listado.php?idPerfil=".$idPerfil);


?>