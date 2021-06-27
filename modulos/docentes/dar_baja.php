<?php
require_once "../../class/Persona.php";
require_once "../../class/Docente.php";

if(isset($_GET["idDocente"])){
    $idDocente=$_GET["idDocente"];
    $idCarrera=$_GET["idCarrera"];
    $idMateria=$_GET["idMateria"];

    $docente=Docente::eliminarRelacionDocenteMateria($idDocente,$idMateria);
    $docente=Docente::eliminarRelacionDocenteCarrera($idDocente,$idCarrera);
    header("Location:listado_por_carrera_materia.php?idMateria=".$idMateria."&idCarrera=".$idCarrera);
    exit;
}

$idPersona=$_GET["id"];

Persona::darDeBaja($idPersona);

header("Location:listado.php");


?>