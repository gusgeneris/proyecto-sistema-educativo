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

$idDia = $_POST['cboDia'];


$horario=new Horario();
$horario->setIdHorario($numero);
$horario->setNumero($numero);
$horario->setHoraInicio($horaInicio);
$horario->setHoraFin($horaFin);
$horario->setIdDia($idDia);

$dato=$horario->actualizarHorario();

if ($dato==1){
    header("Location:listado.php?mj=".CORRECT_UPDATE_CODE);
}else{
    header("Location:listado.php?mj=".INCORRECT_INSERT_DATO_DUPLICATE_CODE);
}

?>