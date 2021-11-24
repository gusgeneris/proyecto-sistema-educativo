<?php

require_once "../../class/Contacto.php";
require_once "../../configs.php";


$idPersona = $_POST["txtIdPersona"];
$idTipoContacto = $_POST["cboTipoContacto"];
$valor = $_POST["Contacto"];

if((!preg_match("/^[a-zA-Z0-9_.+-@]{3,40}$/",$valor))){
    header("Location:listado.php?mj=errorNombre");
    exit;
};


$contacto = new Contacto();

$contacto->setIdPersona($idPersona);
$contacto->setIdTipoContacto($idTipoContacto);
$contacto->setValor($valor);

$contacto->guardar();


header("location: contactos.php?mj=".CORRECT_INSERT_CODE."&idPersona=" . $idPersona);




?>