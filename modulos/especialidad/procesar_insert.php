<?php
require_once "../../class/Especialidad.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];
$idDocente=$_POST["IdDocente"];

if($cancelar==true){
    header("Location:listado.php?idDocente=".$idDocente);
    exit;
}


$descripcion = $_POST['Descripcion'];

$especialidad=new Especialidad();
$especialidad->setDescripcion($descripcion);

$especialidad->insert();
$especialidad->crearRelacionconDocente($idDocente);

if ($especialidad){
    header("Location:listado.php?mj=".CORRECT_INSERT_CODE."&idDocente=".$idDocente);
}

?>