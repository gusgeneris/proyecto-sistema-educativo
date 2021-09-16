<?php
    
    require_once "../../class/Localidad.php";

    $idProvincia=$_GET["id"];

    $respuesta="<option value='0'>->Seleccionar Localidad<-</option>";

    $listadoLocalidad=Localidad::listadoPorProvincia($idProvincia);


    foreach($listadoLocalidad as $localidad):
        $respuesta.= "<option value='". $localidad->getIdLocalidad()."'>". $localidad->getNombre()."</option>";

    endforeach;

    echo $respuesta;
?>