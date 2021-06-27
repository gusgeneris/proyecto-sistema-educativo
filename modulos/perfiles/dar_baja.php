<?php
require_once "../../class/Perfil.php";
$idPerfil=$_GET["id"];

Perfil::darDeBaja($idPerfil);

header("Location:listado.php");


?>