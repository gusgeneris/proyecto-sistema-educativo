<?php
    require_once "../../class/DetalleLibroTemas.php";
    require_once "../../configs.php";
    
    $cancelar= $_POST['Cancelar'];
    
    if($cancelar==true){
        header("Location:listado.php");
        exit;
    }
    
    $idLibroTemas = $_POST['idLibroTemas'];
    $temaDia = $_POST['temaDia'];
    $observaciones = $_POST['observaciones'];
    $idClase= $_POST['idClase'];
    $idCurriculaCarrera= $_POST['idCurriculaCarrera'];

    
    
    $detalleLibroTemas=new DetalleLibroTemas();
    $detalleLibroTemas->setIdLibroTemas($idLibroTemas);
    $detalleLibroTemas->setTemaDia($temaDia);
    $detalleLibroTemas->setObservaciones($observaciones);
    $detalleLibroTemas->setIdClase($idClase);
    
    $detalleLibroTemas->insert();
    
    if ($detalleLibroTemas){
        header("Location:../../modulos/asistencia/insert.php?mj=".CORRECT_INSERT_CODE."&idClase=".$idClase."&idCurriculaCarrera=".$idCurriculaCarrera);
    }
    



?>