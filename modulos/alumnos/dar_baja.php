<?php
require_once "../../class/Persona.php";

$idPersona= $_GET['id'];

Persona::darDeBaja($idPersona);

header("Location:listado.php");

?>