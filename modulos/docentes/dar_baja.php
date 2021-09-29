<?php
require_once "../../class/Persona.php";
require_once "../../class/Docente.php";
require_once "../../class/Carrera.php";

if(isset($_GET["idDocente"])){
    $idDocente=$_GET["idDocente"];
    $idCarrera=$_GET["idCarrera"];
    $idMateria=$_GET["idMateria"];
    $idCicloLectivo=$_GET["idCicloLectivo"];

    
    $idCiCloLectivoCarrera=Carrera::idCicloLectivoCarrera($idCicloLectivo,$idCarrera);

    $docente=Docente::eliminarRelacionDocenteMateria($idDocente,$idMateria);
    $docente=Docente::eliminarRelacionDocenteCarrera($idDocente,$idCiCloLectivoCarrera);
    header("Location:listado_por_carrera_materia.php?idMateria=".$idMateria."&idCarrera=".$idCarrera."&idCicloLectivo=".$idCicloLectivo);
    exit;
}

$idPersona=$_GET["id"];

Persona::darDeBaja($idPersona);

header("Location:listado.php");


?>