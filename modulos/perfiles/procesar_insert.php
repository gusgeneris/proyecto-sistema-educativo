<?php
require_once "../../class/Perfil.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}

$nombre = $_POST['Nombre'];


$perfil=new Perfil();
$perfil->setPerfilNombre($nombre);

$perfil->insert();

if  ($perfil){
    header("Location:listado.php?mj=".CORRECT_INSERT_CODE);
}

?>