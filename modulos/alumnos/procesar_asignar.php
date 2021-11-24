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

$dato=$asignarCicloLectivoCarrera=Alumno::asignarCicloLectivoCarrera($idAlumno,$idCicloLectivoCarrera);

if($dato==1){
    header("Location:asignarCarrera.php?mj=".CORRECT_ASIG_CODE."&idAlumno=".$idAlumno);
}else{
    header("Location:asignarCarrera.php?mj=".INCORRECT_INSERT_DATO_DUPLICATE_CODE."&idAlumno=".$idAlumno);
}

?>