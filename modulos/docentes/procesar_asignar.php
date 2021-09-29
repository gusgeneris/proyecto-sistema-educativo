<?php
    require_once "../../class/Persona.php";
    require_once "../../class/Docente.php";
    require_once "../../class/Mysql.php";
    require_once "../../class/Carrera.php";
    require_once "../../configs.php";

    $idDocente=$_POST["Docente"];
    $idMateria=$_POST["IdMateria"];
    $idCicloLectivo=$_POST["IdCicloLectivo"];
    
    $idCarrera=$_POST["IdCarrera"];
    $docente=new Docente();


    $idCiCloLectivoCarrera=Carrera::idCicloLectivoCarrera($idCicloLectivo,$idCarrera);

    $docente->asignarCarrera($idDocente,$idCiCloLectivoCarrera);
    $docente->asignarMateria($idDocente,$idMateria);

    header("Location:listado_por_carrera_materia.php?idMateria=".$idMateria."&idCarrera=".$idCarrera."&idCicloLectivo=".$idCicloLectivo);



?>