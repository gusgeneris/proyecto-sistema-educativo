<?php
    require_once "../../class/Materia.php";
    require_once "../../configs.php";

    $cancelar= $_POST['Cancelar'];
    $idCarrera=$_POST["IdCarrera"];
    $idMateria=$_POST["idMateria"];
    $materiaNombre=$_POST["NombreMateria"];


    if($cancelar==true){
        header("Location:listado.php?idCarrera=".$idCarrera);
        exit;
    }
    

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
    $materia->setIdMateria($idMateria);
    $materia->setNombre($materiaNombre);

    $materia->modificar();

    if ($materia){
        header("Location:listado.php?mj=".CORRECT_UPDATE_CODE."&idCarrera=".$idCarrera);
    }

?>