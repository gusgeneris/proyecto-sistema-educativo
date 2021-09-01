<?php

require_once "../../class/Domicilio.php";
require_once "../../class/Persona.php";
require_once "../../class/Sexo.php";
require_once "../../class/Perfil.php";
require_once "../../configs.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];    
}

$idPersona=$_GET['idPersona'];
$idDomicilio = $_GET['idDomicilio'];
$domicilio= Domicilio::obtenerPorId($idDomicilio);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar domicilio</title>
</head>
<?php require_once "../../menu.php";?>

<body class="modif-user">
    
<form action="procesar_actualizar.php" method="POST"class="formulario">
        <h1 class="titulo">Ingrese los nuevos datos</h1>

        <div class=""> 
            <input name="IdPersona" type="hidden" class="" value="<?php echo $idPersona; ?>">
        </div>
        <div class=""> 
            <input name="IdDomicilio" type="hidden" class="" value="<?php echo $domicilio->getIdDomicilio(); ?>">
        </div>
        <div class=""> 
            <input name="Detalle" type="text" class="" value="<?php echo $domicilio->getDetalle(); ?>">
        </div>
        <div> 
            <input name="Guardar" type="submit" value="Actualizar" >
            <input name="Cancelar" type="submit" value="Cancelar">
        </div>
</form>
