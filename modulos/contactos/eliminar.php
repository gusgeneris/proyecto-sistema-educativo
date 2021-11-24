<?php

require_once "../../class/Contacto.php";
require_once "../../configs.php";


$idPersona = $_GET["idPersona"];
$idPersonaContacto = $_GET["idPersonaContacto"];


$contacto = Contacto::obtenerPorId($idPersonaContacto);
$contacto->eliminar();


header("location: contactos.php?mj=".CORRECT_DELETE_CODE."&idPersona=" . $idPersona);


?>