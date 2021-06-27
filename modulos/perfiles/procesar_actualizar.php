<?php
require_once "../../class/Perfil.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}
$idPerfil = $_POST['IdPerfil'];
$perfilNombre = $_POST['Nombre'];




$perfil=new Perfil();
$perfil->setIdPerfil($idPerfil);
$perfil->setPerfilNombre($perfilNombre);

$perfil->actualizarPerfil();

if ($perfil){
    header("Location:listado.php?mj=".CORRECT_UPDATE_CODE);
}

?>