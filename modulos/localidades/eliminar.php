<?php
require_once "../../class/Localidad.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$idProvincia=$_GET["idProvincia"];
$idPais=$_GET["idPais"];
$idLocalidad=$_GET["idLocalidad"];

$eliminarRegistro=Localidad::eliminarLocalidad($idLocalidad);

header("Location:listado.php?idProvincia=".$idProvincia."&mj=".CORRECT_DELETE_CODE."&idPais=".$idPais);

?>