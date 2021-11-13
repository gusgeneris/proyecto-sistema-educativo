<?php
require_once "../../class/Persona.php";
require_once "../../class/Docente.php";
require_once "../../class/Carrera.php";
require_once "../../configs.php";  

if(isset($_GET["idDocente"])){
    $idDocente=$_GET["idDocente"];
    $idCarrera=$_GET["idCarrera"];
    $idMateria=$_GET["idMateria"];
    $idCicloLectivo=$_GET["idCicloLectivo"];

    
    $idCiCloLectivoCarrera=Carrera::idCicloLectivoCarrera($idCicloLectivo,$idCarrera);
    
    $idCurriculaCarrera=Carrera::idCurriculaCarrera($idCiCloLectivoCarrera,$idMateria);

    $docente=Docente::eliminarRelacionDocenteMateria($idDocente,$idCurriculaCarrera);

    $docente=Docente::eliminarRelacionDocenteCarrera($idDocente,$idCiCloLectivoCarrera);

    header("Location:listado_por_carrera_materia.php?mj=".CORRECT_DELETE_CODE."&idMateria=".$idMateria."&idCarrera=".$idCarrera."&idCicloLectivo=".$idCicloLectivo);
    exit;
}

?>