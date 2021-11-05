<?php
require_once "../../class/Horario.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}

$numero = $_POST['Numero'];
$horaInicio = $_POST['HoraInicio'];
$horaFin = $_POST['HoraFin'];
$idDia = $_POST['cboDia'];


$horario=new Horario();
$horario->setNumero($numero);
$horario->setHoraInicio($horaInicio);
$horario->setHoraFin($horaFin);
$horario->setIdDia($idDia);

$horario->insert();

if ($horario){
    header("Location:listado.php?mj=".CORRECT_INSERT_CODE);
}

?>