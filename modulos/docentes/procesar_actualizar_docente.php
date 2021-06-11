<?php
require_once "../../class/Persona.php";
require_once "../../class/Docente.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}

$idDocente=$_POST['idDocente'];
$idPersona= $_POST['IdPersona'];
$personaNombre = $_POST['PersonaNom'];
$personaApellido = $_POST['Apellido'];
$personaFechaNac = $_POST['FechaNac'];
$personaDni = $_POST['Dni'];
$personaNacionalidad= $_POST['Nacionalidad'];
$numMatricula= $_POST['NumMatricula'];
$personaSexo= $_POST['Sexo'];

$docente=new Docente();
$docente->setIdDocente($idDocente);
$docente->setNombre($personaNombre);
$docente->setApellido($personaApellido);
$docente->setDni($personaDni);
$docente->setFechaNacimiento($personaFechaNac);
$docente->setNacionalidad($personaNacionalidad);
$docente->setIdPersona($idPersona);
$docente->setIdSexo($personaSexo);
$docente->setNumMatricula($numMatricula);

$docente->actualizarDocente();

if ($docente){
    header("Location:listado.php?mj=".CORRECT_UPDATE_CODE);
}

?>