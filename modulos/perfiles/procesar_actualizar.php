<?php
require_once "../../class/Perfil.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:listado.php");
    exit;
}
$idPerfil = $_POST['IdPerfil'];
$perfilNombre = $_POST['Perfil'];


#COMPRUEBA LAS CANTIDADES MINIMAS DE DIGITOS QUE DEBE CONTENER
if (strlen($perfilNombre) < 3 ){

    header("Location:listado.php?mj=".ERROR_LONGITUD_NAME_CODE);
    exit;
}

if (ctype_alpha($perfilNombre) == false){
    header("Location:listado.php?mj=".ERROR_NAME_NO_PERMITE_NUMEROS_CODE);
    exit;
}





$perfil=new Perfil();
$perfil->setIdPerfil($idPerfil);
$perfil->setPerfilNombre($perfilNombre);

$perfil->actualizarPerfil();

if ($perfil){
    header("Location:listado.php?mj=".CORRECT_UPDATE_CODE);
}

?>