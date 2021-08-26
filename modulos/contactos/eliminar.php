<?php

require_once "../../class/Contacto.php";


$idPersona = $_GET["idPersona"];
$idPersonaContacto = $_GET["idPersonaContacto"];


$contacto = Contacto::obtenerPorId($idPersonaContacto);
$contacto->eliminar();


header("location: contactos.php?idPersona=" . $idPersona);


?>