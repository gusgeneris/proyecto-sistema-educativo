<?php
require_once "../../class/Pais.php";
require_once "../../class/Mysql.php";
require_once "../../configs.php";

$cancelar= $_POST['Cancelar'];

if($cancelar==true){
    header("Location:Domicilios.php");
    exit;
}

$nombre= $_POST['Provincia'];

if((!preg_match("/[a-zA-Z ]{2,254}/",$nombre))){
    header("Location:listado.php?mj=errorNombre");
    exit;
};

$pais=new Pais();
$pais->setNombre($nombre);

$pais->insertarPais();

if ($pais){
    header("Location:listado.php?mj=".CORRECT_INSERT_CODE);
}

?>