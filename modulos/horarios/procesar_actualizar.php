<?php
require_once "../../class/Horario.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}
$idHorario = $_POST['idHorario'];
$numero = $_POST['Numero'];
$horaInicio = $_POST['HoraInicio'];
$horaFin = $_POST['HoraFin'];


$horario=new Horario();
$horario->setIdHorario($numero);
$horario->setNumero($numero);
$horario->setHoraInicio($horaInicio);
$horario->setHoraFin($horaFin);

$horario->actualizarHorario();

if ($horario){
    header("Location:listado.php?mj=".CORRECT_UPDATE_CODE);
}

?>