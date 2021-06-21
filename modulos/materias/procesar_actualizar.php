<?php
    require_once "../../class/Materia.php";
    require_once "../../configs.php";

    $cancelar= $_POST['Cancelar'];
    $idCarrera=$_POST["IdCarrera"];
    $idMateria=$_POST["idMateria"];
    $nombre=$_POST["Nombre"];


    if($cancelar==true){
        header("Location:listado.php?idCarrera=".$idCarrera);
        exit;
    }
    

    
    $materia=new Materia();
    $materia->setIdMateria($idMateria);
    $materia->setNombre($nombre);

    $materia->modificar();

    if ($materia){
        header("Location:listado.php?mj=".CORRECT_UPDATE_CODE."&idCarrera=".$idCarrera);
    }

?>