<?php
require_once "class/Persona.php";
require_once "class/Docente.php";
require_once "class/Mysql.php";
require_once "configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:test_usuario_obtener_todos.php");
    exit;
}

$idDocente=$_POST['idDocente'];
$personaNombre = $_POST['PersonaNom'];
$personaApellido = $_POST['Apellido'];
$personaDni = $_POST['Dni'];
$personaFechaNac = $_POST['FechaNac'];
$personaNacionalidad= $_POST['Nacionalidad'];
$idPersona= $_POST['IdPersona'];
$personaSexo= $_POST['Sexo'];
$numMatricula= $_POST['Perfil'];

$alumno=new Docente();
$alumno->setIdDocente($idDocente);
$alumno->setNombre($personaNombre);
$alumno->setApellido($personaApellido);
$alumno->setDni($personaDni);
$alumno->setFechaNacimiento($personaFechaNac);
$alumno->setNacionalidad($personaNacionalidad);
$alumno->setIdPersona($idPersona);
$alumno->setIdSexo($personaSexo);
$alumno->setNumMatricula($numMatricula);

$alumno->actualizarDocente();

if ($alumno){
    header("Location:listado_docente.php?mj=".CORRECT_UPDATE_CODE);
}

?>