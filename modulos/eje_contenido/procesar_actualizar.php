<?php
require_once "../../class/EjeContenido.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];
$idCarrera=$_POST["IdCarrera"];
$idMateria=$_POST["IdMateria"];


if($cancelar==true){
    header("Location:listado.php?idCarrera=".$idCarrera."&idMateria=".$idMateria);
    exit;
}
$idEjeContenido = $_POST['idEjeContenido'];
$numero = $_POST['Numero'];
$descripcion = $_POST['Descripcion'];

$ejeContenido=new EjeContenido();
$ejeContenido->setIdejeContenido($numero);
$ejeContenido->setNumero($numero);
$ejeContenido->setDescripcion($descripcion);

$ejeContenido->actualizarEjeContenido();

if ($ejeContenido){
    header("Location:listado.php?idCarrera=".$idCarrera."&idMateria=".$idMateria."mj=".CORRECT_UPDATE_CODE);
}

?>