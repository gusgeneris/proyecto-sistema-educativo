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

$checkLista=$_POST["check_lista"];

if (empty($checkLista)){
    $materia=new Materia();
    $materia->eliminarTodaRelacion($idCicloLectivoCarrera,$idAlumno);
    header("Location:listado.php?idAlumno=".$idAlumno."&id=".$idCicloLectivoCarrera);
}



$listadoIdCurriculaCarrera=[];

foreach ($_POST["check_lista"] as $idMateria){
    $materia=new Materia();
    $materia->eliminarTodaRelacion($idCicloLectivoCarrera,$idAlumno);

}

foreach ($_POST["check_lista"] as $idMateria){
    $materia=new Materia;
    $materia->setIdmateria($idMateria);
    $materia->matricularAlumno($idCicloLectivoCarrera,$idAlumno);
  
}



if ($materia){
    header("Location:listado.php?idAlumno=".$idAlumno."&id=".$idCicloLectivoCarrera);
}


?>
