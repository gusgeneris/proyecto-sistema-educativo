<?php
    require_once "../../class/Carrera.php";
    require_once "../../configs.php";

    $cancelar= $_POST['Cancelar'];

    if($cancelar==true){
        header("Location:listado.php");
        exit;
    }

    $idCarrera=$_POST["idCarrera"];
    $nombre=$_POST["Nombre"];
    $duracionAnios=$_POST["DuracionAnios"];

    $carrera=new Carrera();
    $carrera->setIdCarrera($idCarrera);
    $carrera->setNombre($nombre);
    $carrera->setDuracionAnios($duracionAnios);

    $carrera->modificar();

    if ($carrera){
        header("Location:listado.php?mj=".CORRECT_UPDATE_CODE);
    }

?>