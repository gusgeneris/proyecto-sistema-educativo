<?php
require_once "../../class/TipoContacto.php";
require_once "../../configs.php";  

$idTipoContacto=$_GET["idTipoContacto"];

TipoContacto::darBaja($idTipoContacto);

header("Location:listado.php?mj=".CORRECT_DELETE_CODE);


?>