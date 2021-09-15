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
    
    $materiaNombre=$_POST["NombreMateria"];

    #COMPRUEBA LAS CANTIDADES MINIMAS DE DIGITOS QUE DEBE CONTENER
    if (strlen($materiaNombre) < 3 ){

        header("Location:listado.php?mj=".ERROR_LONGITUD_NAME_CODE);
        exit;
    }

    if((!preg_match("/^[a-zA-Z0-9_ ]*$/",$materiaNombre))){
        header("Location:listado.php?mj=assssd");
        exit;
    };

    $materia=new Materia();
    $materia->setNombre($materiaNombre);
    $materia->insert();

    if ($materia){
        header("Location:listado.php?mj=".CORRECT_INSERT_CODE);
    }
?>