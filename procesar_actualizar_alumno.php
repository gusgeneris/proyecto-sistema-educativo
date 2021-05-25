<?php
require_once "class/Persona.php";
require_once "class/Alumno.php";
require_once "class/Mysql.php";
require_once "configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:test_usuario_obtener_todos.php");
    exit;
}

$idAlumno=$_POST['idAlumno'];
$personaNombre = $_POST['PersonaNom'];
$personaApellido = $_POST['Apellido'];
$personaDni = $_POST['Dni'];
$personaFechaNac = $_POST['FechaNac'];
$personaNacionalidad= $_POST['Nacionalidad'];
$idPersona= $_POST['IdPersona'];
$personaSexo= $_POST['Sexo'];
$numLegajo= $_POST['numLegajo'];

$alumno=new Alumno();
$alumno->setIdAlumno($idAlumno);
$alumno->setNombre($personaNombre);
$alumno->setApellido($personaApellido);
$alumno->setDni($personaDni);
$alumno->setFechaNacimiento($personaFechaNac);
$alumno->setNacionalidad($personaNacionalidad);
$alumno->setIdPersona($idPersona);
$alumno->setIdSexo($personaSexo);
$alumno->setNumeroLegajo($numLegajo);

$alumno->actualizarAlumno();

if ($alumno){
    header("Location:listado_alumnos.php?mj=".CORRECT_UPDATE_CODE);
}

?>