<?php
    require_once "../../class/Persona.php";
    require_once "../../class/Docente.php";
    require_once "../../class/Mysql.php";
    require_once "../../configs.php";

    $idDocente=$_POST["Docente"];
    $idMateria=$_POST["IdMateria"];
    
    $idCarrera=$_POST["IdCarrera"];
    $docente=new Docente();
    $docente->asignarCarrera($idDocente,$idCarrera);
    $docente->asignarMateria($idDocente,$idMateria);
    header("Location:listado_por_carrera_materia.php?idMateria=".$idMateria."&idCarrera=".$idCarrera);



?>