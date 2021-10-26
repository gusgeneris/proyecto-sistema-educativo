<?php
    require_once "../../class/CicloLectivo.php";
    require_once "../../class/Carrera.php";
    require_once "../../class/Clase.php";
    require_once "../../class/DetalleLibroTema.php";


    $idClase=$_GET["idClase"];

    $idCicloLectivo=CicloLectivo::obtenerIdCicloPorAnio($anio);

    $idCarrera=$_POST['cboCarrera'];
    $idMateria=$_POST['cboMateria'];

    $idCicloLectivoCarrera=CicloLectivo::obtenerIdCicloLectivoCarrera($idCicloLectivo,$idCarrera);

    $idCurriculaCarrera=Carrera::idCurriculaCarrera($idCicloLectivoCarrera,$idMateria);
    
    header("Location:../../modulos/clase/listado.php?idCurriculaCarrera=". $idCurriculaCarrera);

?>