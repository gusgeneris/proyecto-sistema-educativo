<?php 
require_once "../../class/Materia.php";
require_once "../../class/Alumno.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];
$idCicloLectivoCarrera=$_POST["IdCicloLectivoCarrera"];
$idCicloLectivo= $_POST["IdCicloLectivo"];
$idCarrera= $_POST["IdCarrera"];

if($cancelar==true){
    header("Location:../carreras/listado_por_ciclo.php?idCiclo=".$idCicloLectivo);
    exit;
}


$alumno=new Alumno();



foreach ($_POST["check_lista"] as $idAlumno){
   # $alumno->eliminarTodaRelacionCicloLecticoCarrera($idCicloLectivoCarrera,$idAlumno);
    
    $asignarCicloLectivoCarrera=Alumno::asignarCicloLectivoCarrera($idAlumno,$idCicloLectivoCarrera);
  
}

if ($alumno){
    header("Location:../carreras/listado_por_ciclo.php?mj=".CORRECT_INSERT_CODE."&idCiclo=".$idCicloLectivo);
}


?>
