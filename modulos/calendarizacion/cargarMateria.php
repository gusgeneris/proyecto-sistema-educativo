<?php
require_once "../../class/CicloLectivo.php";
    require_once "../../class/Materia.php";
    require_once "../../class/Usuario.php";
    require_once "../../class/Docente.php";

    session_start();

    if(isset($_SESSION['usuario'])){
    $usuario=$_SESSION['usuario'];
    
    }
    else{header("Location:/proyecto-modulos/login.php?error=".INCORRECT_SESSION_CODE);
    exit;}

    $idPersona=$usuario->getIdPersona();
    $idDocente=Docente::obtenerPorIdPersona($idPersona);

    $anio=date("Y");
    $idCicloLectivo=CicloLectivo::obtenerIdCicloPorAnio($anio);
    $idCarrera=$_GET["idCarrera"];
    

    $respuesta="<option value='0'>->Seleccionar Materia<-</option>";

    $listadoMateria=Materia::listadoPorIdCicloCarrera($idCicloLectivo,$idCarrera,$idDocente);
    
    foreach($listadoMateria as $materia):
        $respuesta.= "<option value='". $materia->getIdMateria()."'>". $materia->getNombre()."</option>";

    endforeach;

    echo $respuesta;

?>