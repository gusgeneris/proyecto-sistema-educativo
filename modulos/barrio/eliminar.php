<?php
require_once "../../class/Barrio.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$idBarrio=$_GET["idBarrio"];
$idLocalidad=$_GET["idLocalidad"];

$eliminarRegistro=Barrio::eliminarBarrio($idBarrio);

header("Location:barrios.php?idLocalidad=".$idLocalidad);

?>