<?php
    require_once "../../class/Materia.php";
    require_once "../../configs.php";

    $cancelar= $_POST['Cancelar'];

    if($cancelar==true){
        header("Location:listado.php");
        exit;
    }

    $idMateria=$_POST["idMateria"];
    $nombre=$_POST["Nombre"];
    
    $materia=new Materia();
    $materia->setIdMateria($idMateria);
    $materia->setNombre($nombre);

    $materia->modificar();

    if ($materia){
        header("Location:listado.php?mj=".CORRECT_UPDATE_CODE);
    }

?>