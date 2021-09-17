<?php

require_once "../../class/Persona.php";
require_once "../../class/Alumno.php";
require_once "../../class/Carrera.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$idAlumno=$_GET['idAlumno'];
$idCicloLectivoCarreraAlumno=$_GET['id'];
$eliminarRelacion=Alumno::eliminarRelacionCicloLecticoCarreraAlumno($idCicloLectivoCarreraAlumno);

header("Location:asignarCarrera.php?idAlumno=".$idAlumno)

?>