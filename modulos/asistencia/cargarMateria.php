<?php
    
    require_once "../../class/Materia.php";
    require_once "../../class/CicloLectivo.php";
    require_once "../../class/Docente.php";
    require_once "../../class/Usuario.php";

    session_start();

    if(isset($_SESSION['usuario'])){
    $usuario=$_SESSION['usuario'];
    
    }
    else{header("Location:/proyecto-modulos/login.php?error=".INCORRECT_SESSION_CODE);
    exit;}

    $idPersona=$usuario->getIdPersona();
    $idDocente=Docente::obtenerPorIdPersona($idPersona);

    $respuesta="<option value='0'>->Seleccionar Materia<-</option>";

    $anio=date("Y");
    
    $idCicloLectivo=CicloLectivo::obtenerIdCicloPorAnio($anio);
    $idCarrera=$_GET['id'];


    $listadoMateria=Materia::listadoPorIdCicloCarrera($idCicloLectivo,$idCarrera,$idDocente);

    foreach($listadoMateria as $materia):
        $nombreMateria=$materia->getNombre();
        $respuesta.= "<option value='". $materia->getIdMateria()."'>". $nombreMateria."</option>";

    endforeach;

    echo $respuesta;
?>