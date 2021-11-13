<?php
require_once "../../class/Carrera.php";
require_once "../../configs.php";
$idCarrera=$_GET["id"];


if(isset($_GET["idCiclo"])){
    $idCicloLectivo=$_GET["idCiclo"];
    $carrera=Carrera::eliminarRelacionCiclo($idCicloLectivo,$idCarrera);
    header("Location:listado_por_ciclo.php?idCiclo=".$idCicloLectivo);
    exit;
}

Carrera::darDeBaja($idCarrera);

header("Location:listado.php?mj=".CORRECT_DELETE_CODE);


?>