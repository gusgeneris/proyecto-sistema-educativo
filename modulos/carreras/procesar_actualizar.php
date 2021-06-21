<?php
    require_once "../../class/Carrera.php";
    require_once "../../configs.php";

    $cancelar= $_POST['Cancelar'];
    $idCicloLectivo=$_POST["IdCiclo"];

    if($cancelar==true){
        header("Location:listado.php?idCiclo=".$idCicloLectivo);
        exit;
    }

    $idCarrera=$_POST["IdCarrera"];
    $nombre=$_POST["Nombre"];
    $duracionAnios=$_POST["DuracionAnios"];

    $carrera=new Carrera();
    $carrera->setIdCarrera($idCarrera);
    $carrera->setNombre($nombre);
    $carrera->setDuracionAnios($duracionAnios);

    $carrera->modificar();

    if ($carrera){
        header("Location:listado.php?mj=".CORRECT_UPDATE_CODE."&idCiclo=".$idCicloLectivo);
    }

?>