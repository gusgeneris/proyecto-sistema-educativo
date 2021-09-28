<?php
    require_once "../../class/Carrera.php";

    $idCicloLectivo=$_GET["id"];

    $respuesta="<option value='0'>->Seleccionar Carrera<-</option>";

    $listadoCarrerasPorCicloLectivo=Carrera::listadoCarrerasPorCicloLectivo($idCicloLectivo);
    
    foreach($listadoCarrerasPorCicloLectivo as $carrera):
        $respuesta.= "<option value='". $carrera->getIdCarrera()."'>". $carrera->getNombre()."</option>";

    endforeach;

    echo $respuesta;

?>