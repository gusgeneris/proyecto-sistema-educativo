<?php
require_once "../../class/Especialidad.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

$idDocente=$_POST["IdDocente"];

if($cancelar==true){
    if($idDocente==true){
        header("Location:listado_por_docente.php?idDocente=".$idDocente);
        exit;
    }
    else{
        header("Location:listado.php");
        exit;}
}


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
$especialidad->setDescripcion($descripcion);
$especialidad->insert();

if($idDocente==true){
    header("Location:listado_por_docente.php?mj=".CORRECT_INSERT_CODE."&idDocente=".$idDocente);
}


if ($especialidad){
    header("Location:listado.php?mj=".CORRECT_INSERT_CODE);
}

?>