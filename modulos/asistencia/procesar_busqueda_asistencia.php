<?php
    require_once "../../class/CicloLectivo.php";
    require_once "../../class/Carrera.php";
    require_once "../../class/Clase.php";
    require_once "../../class/TipoClase.php";
    require_once "../../mensaje.php";




    if(isset($_GET["idCicloLectivo"])):
        $idCarrera=$_GET['idCarrera'];
        $idMateria=$_GET['idMateria'];
        $idCicloLectivo=$_GET["idCicloLectivo"];

        $idCicloLectivoCarrera=CicloLectivo::obtenerIdCicloLectivoCarrera($idCicloLectivo,$idCarrera);

        $idCurriculaCarrera=Carrera::idCurriculaCarrera($idCicloLectivoCarrera,$idMateria);
        
        header("Location:../../modulos/reportes/domPdf/reporte_asistencia.php?idCurriculaCarrera=". $idCurriculaCarrera);
        exit;

    endif;

    $anio=date("Y");

    $idCicloLectivo=CicloLectivo::obtenerIdCicloPorAnio($anio);

    $idCarrera=$_POST['cboCarrera'];
    $idMateria=$_POST['cboMateria'];

    $idCicloLectivoCarrera=CicloLectivo::obtenerIdCicloLectivoCarrera($idCicloLectivo,$idCarrera);

    $idCurriculaCarrera=Carrera::idCurriculaCarrera($idCicloLectivoCarrera,$idMateria);
    
    header("Location:../../reportes/domPdf/reporte_asistencia.php?idCurriculaCarrera=". $idCurriculaCarrera);

?>