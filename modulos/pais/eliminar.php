<?php
require_once "../../class/Pais.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$idPais=$_GET["idPais"];

$eliminarRegistro=Pais::eliminarPais($idPais);

header("Location:paises.php");

?>