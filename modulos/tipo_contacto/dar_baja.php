<?php
require_once "../../class/TipoContacto.php";

$idTipoContacto=$_GET["idTipoContacto"];

TipoContacto::darBaja($idTipoContacto);

header("Location:listado.php");


?>