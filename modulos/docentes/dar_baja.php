<?php
require_once "../../class/Persona.php";
require_once "../../configs.php";  

$idPersona=$_GET["id"];

Persona::darDeBaja($idPersona);

header("Location:listado.php?mj=".CORRECT_DELETE_CODE);


?>