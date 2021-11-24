<?php
require_once "../../class/DetalleLibroTemas.php";
require_once "../../class/CicloLectivo.php";
require_once "../../class/Carrera.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}



$anio=date("Y");
$idCicloLectivo = CicloLectivo::obtenerIdCicloPorAnio($anio);
$idCarrera=$_POST['cboCarrera'];
$idMateria=$_POST['cboMateria'];

$idCicloLectivoCarrera=CicloLectivo::obtenerIdCicloLectivoCarrera($idCicloLectivo,$idCarrera);

$idCurriculaCarrera=Carrera::idCurriculaCarrera($idCicloLectivoCarrera,$idMateria);



header("Location:listado.php?idMateria=".$idMateria."&idCarrera=".$idCarrera."&mj=".CORRECT_SEARCH_CODE."&idCurriculaCarrera=".$idCurriculaCarrera);


?>