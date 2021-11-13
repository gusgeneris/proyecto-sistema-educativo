<?php
require_once "../../class/Materia.php";
require_once "../../configs.php";
$idMateria=$_GET["id"];

Materia::darDeBaja($idMateria);

header("Location:listado.php?mj=".CORRECT_DELETE_CODE);

?>