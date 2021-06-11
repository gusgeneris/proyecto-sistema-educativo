<?php
require_once "../../class/Persona.php";
require_once "../../class/Alumno.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}

$personaNombre = $_POST['NombrePers'];
$personaApellido = $_POST['Apellido'];
$personaDni = $_POST['Dni'];
$personaFechaNac = $_POST['FechaNac'];
$personaNacionalidad= $_POST['Nacionalidad'];
$alumnoNumLegajo= $_POST['NumLegajo'];
$personaSexo= $_POST['Sexo'];
$usuarioPerfil= $_POST['Perfil'];


$alumno=new Alumno();
$alumno->setNombre($personaNombre);
$alumno->setApellido($personaApellido);
$alumno->setDni($personaDni);
$alumno->setFechaNacimiento($personaFechaNac);
$alumno->setNacionalidad($personaNacionalidad);
$alumno->setNumeroLegajo($alumnoNumLegajo);
$alumno->setIdSexo($personaSexo);

$alumno->insertAlumno();

if ($alumno){
    header("Location:listado.php?mj=".CORRECT_INSERT_CODE);
}

?>