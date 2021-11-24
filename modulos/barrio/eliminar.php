<?php
require_once "../../class/Barrio.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$idBarrio=$_GET["idBarrio"];
$idLocalidad=$_GET["idLocalidad"];
$idProvincia=$_GET['idProvincia'];
$idPais=$_GET['idPais'];


$eliminarRegistro=Barrio::eliminarBarrio($idBarrio);

header("Location:listado.php?mj=".CORRECT_DELETE_CODE."&idLocalidad=".$idLocalidad."&idPais=".$idPais."&idProvincia=".$idProvincia);

?>