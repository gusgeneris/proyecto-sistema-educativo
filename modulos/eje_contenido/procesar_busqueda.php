<?php
    require_once "../../class/CicloLectivo.php";
    require_once "../../class/Carrera.php";
    require_once "../../class/Clase.php";
    require_once "../../class/TipoClase.php";


    $anio=date("Y");

    $idCicloLectivo=CicloLectivo::obtenerIdCicloPorAnio($anio);

    $idCarrera=$_POST['cboCarrera'];
    $idMateria=$_POST['cboMateria'];

    $idCicloLectivoCarrera=CicloLectivo::obtenerIdCicloLectivoCarrera($idCicloLectivo,$idCarrera);

    $idCurriculaCarrera=Carrera::idCurriculaCarrera($idCicloLectivoCarrera,$idMateria);
    
    header("Location:../../modulos/eje_contenido/listado.php?idCurriculaCarrera=".$idCurriculaCarrera."&idMateria=".$idMateria."&idCarrera=".$idCarrera);

?>