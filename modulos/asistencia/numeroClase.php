<?php
    
    require_once "../../class/Clase.php";
    require_once "../../class/CicloLectivo.php";

    $idCarrera=$_GET["idCarrera"];
    $idMateria=$_GET["idMateria"];

    

    $respuesta="<option value='0'>->Seleccionar Materia<-</option>";

    $anio=date("Y");
    
    $idCicloLectivo=CicloLectivo::obtenerIdCicloPorAnio($anio);

    $numeroClase=Clase::numeroClase($idCicloLectivo,$idCarrera,$idMateria);


    $respuesta=$numeroClase;    

    echo $respuesta;
?>