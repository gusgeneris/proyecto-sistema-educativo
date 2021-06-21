<?php
require_once "../../class/Especialidad.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];
$idDocente=$_POST['IdDocente'];


if($cancelar==true){
    header("Location:listado.php?idDocente=".$idDocente);
    exit;
}


$idEspecialidad = $_POST['IdEspecialidad'];
$descripcion = $_POST['Descripcion'];


$especialidad=new Especialidad();
$especialidad->setIdEspecialidad($idEspecialidad);
$especialidad->setDescripcion($descripcion);

$especialidad->actualizarEspecialidad();

if ($especialidad){
    header("Location:listado.php?mj=".CORRECT_UPDATE_CODE."&idDocente=".$idDocente);
}

?>