<?php 

require_once "../../class/Materia.php";
require_once "../../configs.php";


$idCarrera=$_GET["idCarrera"];
$idCicloLectivo=$_GET["idCiclo"];

$idCicloLectivoCarrera=$_GET['idCicloLectivoCarrera'];
$idMateria=$_GET['idMateria'];

$alta=Materia::darAltaRelacionACarreraCiclo($idCicloLectivoCarrera,$idMateria);


if($alta){
    header("Location:listado_por_carrera.php?idCiclo=".$idCicloLectivo."&mj=".CORRECT_ALTA_CODE."&idCarrera=".$idCarrera);
}



?>