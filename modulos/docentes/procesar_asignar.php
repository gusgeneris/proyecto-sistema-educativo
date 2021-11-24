<?php
    require_once "../../class/Persona.php";
    require_once "../../class/Docente.php";
    require_once "../../class/Mysql.php";
    require_once "../../class/Carrera.php";
    require_once "../../configs.php";

    $idDocente=$_POST["cboDocente"];
    $idMateria=$_POST["IdMateria"];
    $idCicloLectivo=$_POST["IdCicloLectivo"];
    
    $idCarrera=$_POST["IdCarrera"];
    $docente=new Docente();


    $idCiCloLectivoCarrera=Carrera::idCicloLectivoCarrera($idCicloLectivo,$idCarrera);

    $idCurriculaCarrera=Carrera::idCurriculaCarrera($idCiCloLectivoCarrera,$idMateria);

    $cicloCarrera=$docente->asignarCarrera($idDocente,$idCiCloLectivoCarrera);

    $materia=$docente->asignarMateria($idDocente,$idCurriculaCarrera);

    if($materia==1&&$cicloCarrera==1){
        header("Location:listado_por_carrera_materia.php?mj=".INCORRECT_INSERT_DOCENTE_DUPLICATE_CODE."&idMateria=".$idMateria."&idCarrera=".$idCarrera."&idCicloLectivo=".$idCicloLectivo);
    }else{
        header("Location:listado_por_carrera_materia.php?mj=".CORRECT_ASIG_CODE."&idMateria=".$idMateria."&idCarrera=".$idCarrera."&idCicloLectivo=".$idCicloLectivo);
        
    }


?>