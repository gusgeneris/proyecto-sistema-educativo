<?php
    require_once "../../class/Mysql.php";
    require_once "../../class/Materia.php";
    require_once "../../configs.php";

    
    $idCarrera=$_POST["IdCarrera"];
    
    $idCicloLectivo=$_POST["IdCiclo"];

    $anioDesarrollo=$_POST["cboAnioDesarrollo"];
    $periodoDesarrollo=$_POST["cboPeriodoDesarrollo"];

    if(isset($_POST['Cancelar'])){
        header("Location:listado_por_carrera.php?idCarrera=".$idCarrera."&idCiclo=".$idCicloLectivo);
        exit;
    }

    $idMateria=$_POST["cboMateria"];


    $dato=Materia::crearRelacionConCarrera($idMateria,$idCarrera,$idCicloLectivo,$periodoDesarrollo,$anioDesarrollo);

    if ($materia==true){
        header("Location:listado_por_carrera.php?idCarrera=".$idCarrera."&mj=".CORRECT_ASIG_CODE."&idCiclo=".$idCicloLectivo);
    }


    if($dato==1){
        header("Location:listado_por_carrera.php?idCarrera=".$idCarrera."&mj=".CORRECT_ASIG_CODE."&idCiclo=".$idCicloLectivo);
        }
    else{
        header("Location:listado_por_carrera.php?idCarrera=".$idCarrera."&mj=".INCORRECT_INSERT_MENSAJE_CARRERA_DUPLICATE_CODE."&idCiclo=".$idCicloLectivo);
        
    }
    exit;
?>