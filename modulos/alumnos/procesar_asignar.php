<?php

require_once "../../class/Persona.php";
require_once "../../class/Alumno.php";
require_once "../../class/Carrera.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$idAlumno=$_POST['IdAlumno'];
$idCicloLectivo = $_POST['cboCicloLectivo'];
$idCarrera = $_POST['cboCarrera'];


$idCicloLectivoCarrera=Carrera::idCicloLectivoCarrera($idCicloLectivo,$idCarrera);

$asignarCicloLectivoCarrera=Alumno::asignarCicloLectivoCarrera($idAlumno,$idCicloLectivoCarrera);


header("Location:asignarCarrera.php?idAlumno=".$idAlumno)

?>