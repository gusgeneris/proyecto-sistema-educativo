<?php
require_once "class/Persona.php";
require_once "class/Docente.php";
require_once "class/Mysql.php";
require_once "configs.php";

$personaNombre = $_POST['NombrePers'];
$personaApellido = $_POST['Apellido'];
$personaDni = $_POST['Dni'];
$personaFechaNac = $_POST['FechaNac'];
$personaNacionalidad= $_POST['Nacionalidad'];
$docenteNumMatricula= $_POST['NumMatricula'];
$personaSexo= $_POST['Sexo'];


$docente=new Docente();
$docente->setNombre($personaNombre);
$docente->setApellido($personaApellido);
$docente->setDni($personaDni);
$docente->setFechaNacimiento($personaFechaNac);
$docente->setNacionalidad($personaNacionalidad);
$docente->setNumMatricula($docenteNumMatricula);
$docente->setIdSexo($personaSexo);

$docente->insertDocente();

if ($docente){
    header("Location:listado_docente.php?mj=".CORRECT_INSERT_CODE);
} 
?>