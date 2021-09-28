<?php
    require_once "../../class/Materia.php";

    $idCicloLectivo=$_GET["idCiclo"];
    $idCarrera=$_GET["idCarrera"];


    $respuesta="<option value='0'>->Seleccionar Materia<-</option>";

    $listadoMateria=Materia::listadoPorIdCarrera($idCicloLectivo,$idCarrera);
    
    foreach($listadoMateria as $materia):
        $respuesta.= "<option value='". $materia->getIdMateria()."'>". $materia->getNombre()."</option>";

    endforeach;

    echo $respuesta;

?>