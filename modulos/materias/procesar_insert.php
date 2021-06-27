<?php
    require_once "../../class/Mysql.php";
    require_once "../../class/Materia.php";
    require_once "../../configs.php";

    $cancelar= $_POST['Cancelar'];
    $idCarrera=$_POST["IdCarrera"];

    if($cancelar==true){
        header("Location:listado.php");
        exit;
    }

    $materiaNombre=$_POST["Nombre"];

    $materia=new Materia();
    $materia->setNombre($materiaNombre);
    $materia->insert();

    if ($materia){
        header("Location:listado.php?mj=".CORRECT_INSERT_CODE);
    }
?>