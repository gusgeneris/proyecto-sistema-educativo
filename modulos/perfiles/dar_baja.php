<?php
require_once "../../class/Perfil.php";
require_once "../../configs.php";

$idPerfil=$_GET["id"];

Perfil::darDeBaja($idPerfil);

header("Location:listado.php?mj=".CORRECT_DELETE_CODE);


?>