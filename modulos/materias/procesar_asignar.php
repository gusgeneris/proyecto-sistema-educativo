<?php
    require_once "../../class/Mysql.php";
    require_once "../../class/Materia.php";
    require_once "../../configs.php";

    
    $idCarrera=$_POST["IdCarrera"];

    if(isset($_POST['Cancelar'])){
        header("Location:listado_por_carrera.php?idCarrera=".$idCarrera);
        exit;
    }

    $idMateria=$_POST["cboMateria"];


    $materia=Materia::crearRelacionConCarrera($idMateria,$idCarrera);

    if ($materia==true){
        header("Location:listado_por_carrera.php?idCarrera=".$idCarrera."&mj=".CORRECT_INSERT_CODE);
    }
?>