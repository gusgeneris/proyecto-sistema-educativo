<?php
require_once "../../class/Especialidad.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}


$descripcion = $_POST['descripcion'];

$especialidad=new Especialidad();
$especialidad->setDescripcion($descripcion);

$especialidad->insert();

if ($especialidad){
    header("Location:listado.php?mj=".CORRECT_INSERT_CODE);
}

?>