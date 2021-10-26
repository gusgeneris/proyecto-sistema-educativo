<?php
    require_once "../../class/Alumno.php";
    require_once "../../class/Carrera.php";
    require_once "../../class/Clase.php";
    require_once "../../class/Asistencia.php";


    if($cancelar==true){
        header("Location:listado.php?idPerfil=".$idPerfil);
        exit;
    }

    $idClase=$_POST["idClase"];
    $idMateria=$_POST["idMateria"];
    $idCicloLectivoCarrera=$_POST["idCicloLectivoCarrera"];

    $listado=Alumno::listadoPorIdCurriculaCarrera($idCicloLectivoCarrera,$idMateria);

    

    foreach($listado as $alumno ){
        $asistencia=new Asistencia();
        $asistencia->setIdClase($idClase);
        $asistencia->setIdAlumno($alumno->getIdAlumno());

        $asistencia->insertAlumnos();

    } 
    
    foreach ($_POST["check_lista"] as $idAlumno){
        
        $asistencia=new Asistencia();
        $asistencia->setIdClase($idClase);
        $asistencia->setIdAlumno($idAlumno);

        $asistencia->registrarAsistencia();
      
    }
    

    
    header("Location:../../modulos/clase/informeFinal.php?idClase=".$idClase);

?>