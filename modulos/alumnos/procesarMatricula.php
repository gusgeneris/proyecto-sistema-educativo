<?php 
require_once "../../class/Materia.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];
$idAlumno=$_POST["IdAlumno"];
$idCicloLectivoCarrera=$_POST["IdCicloLectivoCarrera"];

if($cancelar==true){
    header("Location:asignarCarrera.php?idAlumno=".$idAlumno);
    exit;
}


$materia=new Materia();
$materia->eliminarTodaRelacion($idAlumno);

foreach ($_POST["check_lista"] as $idMateria){
    
    $materia->setIdmateria($idMateria);
    $materia->matricularAlumno($idAlumno);
  
}

if ($materia){
    header("Location:matriculacionAMaterias.php?idAlumno=".$idAlumno."&id=".$idCicloLectivoCarrera);
}


?>
