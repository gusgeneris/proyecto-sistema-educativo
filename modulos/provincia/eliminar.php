<?php
require_once "../../class/Provincia.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$idPais=$_GET["idPais"];
$idProvincia=$_GET["idProvincia"];

$eliminarRegistro=Provincia::eliminarProvincia($idProvincia);

header("Location:listado.php?idPais=".$idPais."&mj=".CORRECT_DELETE_CODE);

?>