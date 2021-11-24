<?php
    require_once "../../class/Materia.php";
    require_once "../../configs.php";

    $idCarrera=$_POST["idCarrera"];
    $idCiclo=$_POST["idCiclo"];
    $idCurriculaCarrera=$_POST["idCurriculaCarrera"];
    $idPeriodo=$_POST["cboPeriodoDesarrollo"];
    $idAnio=$_POST["cboAnioDesarrollo"];
    

    $materia=Materia::modificarPeriodo($idCurriculaCarrera,$idAnio,$idPeriodo);

    if ($materia){
        header("Location:listado_por_carrera.php?mj=".CORRECT_UPDATE_CODE."&idCarrera=".$idCarrera."&idCiclo=".$idCiclo);
    }

?>