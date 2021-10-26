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
    
    $numeroClase=$_POST['numeroClase'];
    
    $numeroClase=trim($numeroClase);
    
    $fechaClase=$_POST['fechaClase'];
    $tipoClase=$_POST['cboTipoClase'];

    $clase=new Clase;
    $clase->setNumeroClase($numeroClase);
    $clase->setFechaClase($fechaClase);
    $clase->setTipoClase($tipoClase);

    $clase->insert($idCurriculaCarrera);
    $idClase=$clase->getIdClase();

    
    header("Location:../../modulos/libroTemas/insert.php?idClase=". $idClase."&idMateria=".$idMateria);

?>