<?php
    
    require_once "../../class/Barrio.php";

    $idBarrio=$_GET["id"];

    $respuesta="<option value='0'>->Seleccionar Barrio<-</option>";

    $listadoBarrio=Barrio::listadoPorLocalidad($idBarrio);


    foreach($listadoBarrio as $barrio):
        $respuesta.= "<option value='". $barrio->getIdBarrio()."'>". $barrio->getNombre()."</option>";

    endforeach;

    echo $respuesta;
?>