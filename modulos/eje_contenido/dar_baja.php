<?php
    require_once "../../class/EjeContenido.php";    
    require_once "../../class/CicloLectivo.php";
    require_once "../../class/Carrera.php";

    $idEjeContenido=$_GET["id"];

    $anio=date("Y");

    $idCicloLectivo=CicloLectivo::obtenerIdCicloPorAnio($anio);

    
    $idCarrera=$_GET["idCarrera"];
    $idMateria=$_GET["idMateria"];
    
    $idCicloLectivoCarrera=CicloLectivo::obtenerIdCicloLectivoCarrera($idCicloLectivo,$idCarrera);

    $idCurriculaCarrera=Carrera::idCurriculaCarrera($idCicloLectivoCarrera,$idMateria);


    EjeContenido::darDeBaja($idEjeContenido);

    header("Location:listado.php?idCurriculaCarrera=".$idCurriculaCarrera."&idCarrera=".$idCarrera."&idMateria=".$idMateria);


?>