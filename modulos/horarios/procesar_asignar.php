<?php
require_once "../../class/Horario.php";
require_once "../../class/CicloLectivo.php";
require_once "../../class/Carrera.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}

$idCicloLectivo = $_POST['idCicloLectivo'];

$idCarrera = $_POST['idCarrera'];
$idMateria = $_POST['cboMateria'];
$idDia = $_POST['cboDia'];

$idCicloLectivoCarrera=CicloLectivo::obtenerIdCicloLectivoCarrera($idCicloLectivo,$idCarrera);

$idCurriculaCarrera=Carrera::idCurriculaCarrera($idCicloLectivoCarrera,$idMateria);



foreach ($_POST["check_lista"] as $numeroModulo){
    $idHorario=Horario::obtenerIdHorario($idDia,$numeroModulo);

    $asignar=Horario::asignarHorarioACurriculaCarrera($idHorario,$idCurriculaCarrera);
  
}


header("Location:crear_horario.php?idCurriculaCarrera=".$idCurriculaCarrera."&idCarrera=".$idCarrera."&idCiclo=".$idCicloLectivo."&mj=".CORRECT_INSERT_CODE);




?>