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

$numero = $_POST['Numero'];
$descripcion = $_POST['Descripcion'];

$ejeContenido=new EjeContenido();
$ejeContenido->setNumero($numero);
$ejeContenido->setDescripcion($descripcion);

$ejeContenido->insert();
$ejeContenido->insertPorCarreraMateria($idMateria, $idCarrera);

if ($ejeContenido){
    header("Location:listado.php?idCarrera=".$idCarrera."&idMateria=".$idMateria."&mj=".CORRECT_INSERT_CODE);
}

?>