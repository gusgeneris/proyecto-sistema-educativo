<?php
require_once "../../class/Domicilio.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$idDomicilio=$_GET["idDomicilio"];
$idPersona=$_GET["idPersona"];

$eliminarRegistro=Domicilio::eliminarRegistro($idDomicilio);

header("Location:domicilios.php?idPersona=".$idPersona."&mj=".CORRECT_DELETE_CODE);

?>