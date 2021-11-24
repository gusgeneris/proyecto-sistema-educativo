<?php
    require_once "../../class/EjeContenido.php";    
    require_once "../../class/CicloLectivo.php";
    require_once "../../class/Carrera.php";
    require_once "../../configs.php";

    $idEjeContenido=$_GET["id"];

    $anio=date("Y");

    $idCicloLectivo=CicloLectivo::obtenerIdCicloPorAnio($anio);

    
    $idCarrera=$_GET["idCarrera"];
    $idMateria=$_GET["idMateria"];
    
    $idCicloLectivoCarrera=CicloLectivo::obtenerIdCicloLectivoCarrera($idCicloLectivo,$idCarrera);

    $idCurriculaCarrera=Carrera::idCurriculaCarrera($idCicloLectivoCarrera,$idMateria);


    EjeContenido::darDeBaja($idEjeContenido);

    if(isset($_GET["idLocation"])){
        header("Location:listado_por_materia.php?mj=".CORRECT_DELETE_CODE."&idCicloLectivo=".$idCicloLectivo."&idCarrera=".$idCarrera."&idMateria=".$idMateria);
        exit;
    }else{
    header("Location:listado.php?mj=".CORRECT_DELETE_CODE."&idCurriculaCarrera=".$idCurriculaCarrera."&idCarrera=".$idCarrera."&idMateria=".$idMateria);
    }

?>