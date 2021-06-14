<?php
require_once "../../class/Materia.php";
$idMateria=$_GET["id"];

Materia::darDeBaja($idMateria);

header("Location:listado.php");

highlight_string(var_export($usuario));

exit;

?>