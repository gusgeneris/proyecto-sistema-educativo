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
$descripcion = $_POST['Especialidad'];

#COMPRUEBA LAS CANTIDADES MINIMAS DE DIGITOS QUE DEBE CONTENER
if (strlen($descripcion) < 3 ){

    header("Location:listado.php?mj=".ERROR_LONGITUD_NAME_CODE);
    exit;
}

if((!preg_match("/^[a-zA-Z_ ]*$/",$descripcion))){
    header("Location:listado.php?mj=assssd");
    exit;
};




$especialidad=new Especialidad();
$especialidad->setIdEspecialidad($idEspecialidad);
$especialidad->setDescripcion($descripcion);

$especialidad->actualizarEspecialidad();

if ($especialidad){
    header("Location:listado.php?mj=".CORRECT_UPDATE_CODE."&idDocente=".$idDocente);
}

?>