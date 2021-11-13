<?php 

require_once "../../class/Docente.php";
require_once "../../configs.php";  


$idMateria=$_GET["idMateria"];
$idCarrera=$_GET["idCarrera"];
$idCicloLectivo=$_GET["idCicloLectivo"];

$idDocente=$_GET['idDocente'];
$idCicloLectivoCarrera=$_GET["idCicloLectivoCarrera"];
$idCurriculaCarrera=$_GET["idCurriculaCarrera"];

$idDocenteCarrera=Docente::idDocenteCarrera($idDocente,$idCicloLectivoCarrera);
$idDocenteMateria=Docente::idDocenteMateria($idDocente,$idCurriculaCarrera);

$docente=Docente::darAltaDocenteCarrera($idDocente,$idCicloLectivoCarrera);
$docente=Docente::darAltaDocenteMateria($idDocente,$idCurriculaCarrera);


if($docente){
    header("Location:listado_por_carrera_materia.php?mj=".CORRECT_ALTA_CODE."&idMateria=".$idMateria."&idCarrera=".$idCarrera."&idCicloLectivo=".$idCicloLectivo);
}



?>