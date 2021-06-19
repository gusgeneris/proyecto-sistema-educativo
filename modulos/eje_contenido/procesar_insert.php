<?php
require_once "../../class/EjeContenido.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}

$numero = $_POST['Numero'];
$descripcion = $_POST['descripcion'];

$ejeContenido=new EjeContenido();
$ejeContenido->setNumero($numero);
$ejeContenido->setdescripcion($descripcion);

$ejeContenido->insert();

if ($ejeContenido){
    header("Location:listado.php?mj=".CORRECT_INSERT_CODE);
}

?>