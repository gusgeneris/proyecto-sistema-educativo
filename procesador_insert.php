<?php
require_once "class/Persona.php";
require_once "class/Usuario.php";
require_once "class/Mysql.php";
$user=1;
$psw=123;
$id=10;

/*Usuario::insertUser($user,$psw,$id);*/



$nombreUser = $_POST['NombreUser'];
$contrasenia = $_POST['Contrasenia'];
$personaNombre = $_POST['NombrePers'];
$personaApellido = $_POST['Apellido'];
$personaDni = $_POST['Dni'];
$personaFechaNac = $_POST['FechaNac'];
$personaEstado = $_POST['Estado'];
$personaSexo= $_POST['Sexo'];

$user=new Usuario();
$user->insertUser($personaNombre,$personaApellido,$personaDni,$personaFechaNac,$personaEstado,$personaSexo,$nombreUser,$contrasenia);  

echo 'HI';

/*$db=new Mysql();





$user=Usuario::insertUser($nombreUser,$contrasenia,$idUser);*/

?>