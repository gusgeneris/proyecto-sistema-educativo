<?php
    
    require_once "../../class/Provincia.php";

    $idPais=$_GET["id"];

    $respuesta="<option value='0'>->Seleccionar Provincia<-</option>";

    $listadoProvincia=Provincia::listadoPorPais($idPais);


    foreach($listadoProvincia as $provincia):
        $respuesta.= "<option value='". $provincia->getIdProvincia()."'>". $provincia->getNombre()."</option>";

    endforeach;

    echo $respuesta;
?>