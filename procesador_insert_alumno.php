<?php
require_once "class/Persona.php";
require_once "class/Alumno.php";
require_once "class/Mysql.php";
require_once "configs.php";

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
    header("Location:test_usuario_obtener_todos.php?mj=".CORRECT_INSERT_CODE);
}

?>