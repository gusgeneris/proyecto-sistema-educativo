<?php
require_once "../../class/Especialidad.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];
$idDocente=$_POST["IdDocente"];

if($cancelar==true){
    header("Location:listado_por_docente.php?idDocente=".$idDocente);
    exit;
}


$especialidad=new Especialidad();
$especialidad->eliminarTodaRelacion($idDocente);

foreach ($_POST["check_lista"] as $idEspecialidad){
    
    $especialidad->setIdEspecialidad($idEspecialidad);
    $especialidad->crearRelacionconDocente($idDocente);
  
}

if ($especialidad){
    header("Location:listado_por_docente.php?mj=".CORRECT_INSERT_CODE."&idDocente=".$idDocente);
}

?>