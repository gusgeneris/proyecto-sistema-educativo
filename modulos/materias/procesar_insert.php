<?php
    require_once "../../class/Mysql.php";
    require_once "../../class/Materia.php";
    require_once "../../configs.php";

    $cancelar= $_POST['Cancelar'];

    if($cancelar==true){
        header("Location:listado.php");
        exit;
    }

    $materiaNombre=$_POST["Nombre"];
    $idCarrera=$_POST["IdCarrera"];

    $materia=new Materia();
    $materia->setNombre($materiaNombre);
    $materia->insert();

    $materia->crearRelacionConCarrera($idCarrera);

    if ($materia){
        header("Location:listado.php?idCarrera=".$idCarrera."&mj=".CORRECT_INSERT_CODE);
    }
?>