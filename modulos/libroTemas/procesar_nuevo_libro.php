<?php
require_once "../../class/LibroTemas.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}

$idCurriculaCarrera = $_POST['idCurriculaCarrera'];
$idClase = $_POST['idClase'];
$idMateria = $_POST['idMateria'];


$libroTemas=new LibroTemas();
$libroTemas->setIdCurriculaCarrera($idCurriculaCarrera);

$libroTemas->insert();

if ($libroTemas){
    header("Location:insert.php?mj=".CORRECT_INSERT_CODE."&idCurriculaCarrera=".$idCurriculaCarrera."&idClase=".$idClase."&idMateria=".$idMateria);
}

?>