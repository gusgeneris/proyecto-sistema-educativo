<?php
require_once "class/Usuario.php";
require_once "class/Persona.php";
require_once "configs.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];    
}

$lista= Usuario::obtenerTodoPorId($id);








?>
