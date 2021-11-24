<?php 

require_once "../../class/Perfil.php";
require_once "../../configs.php";  

$idPerfil=$_GET['id'];

$perfil=Perfil::darAlta($idPerfil);


if($perfil){
    header("Location:listado.php?mj=".CORRECT_ALTA_CODE);
}



?>