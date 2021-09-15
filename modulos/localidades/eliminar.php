<?php
require_once "../../class/Localidad.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$idProvincia=$_GET["idProvincia"];
$idLocalidad=$_GET["idLocalidad"];

$eliminarRegistro=Localidad::eliminarLocalidad($idLocalidad);

header("Location:localidades.php?idProvincia=".$idProvincia);

?>