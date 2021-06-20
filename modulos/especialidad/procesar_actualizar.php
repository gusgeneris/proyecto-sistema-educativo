<?php
require_once "../../class/Especialidad.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}
$idEspecialidad = $_POST['idEspecialidad'];
$numero = $_POST['Numero'];
$descripcion = $_POST['Descripcion'];

$especialidad=new Especialidad();
$especialidad->setIdEspecialidad($numero);
$especialidad->setDescripcion($descripcion);

$especialidad->actualizarEspecialidad();

if ($especialidad){
    header("Location:listado.php?mj=".CORRECT_UPDATE_CODE);
}

?>