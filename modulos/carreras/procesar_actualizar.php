<?php
    require_once "../../class/Carrera.php";
    require_once "../../configs.php";

    $cancelar= $_POST['Cancelar'];
    $idCicloLectivo=$_POST["IdCiclo"];

    if($cancelar==true){
        header("Location:listado.php?idCiclo=".$idCicloLectivo);
        exit;
    }

    $idCarrera=$_POST["IdCarrera"];
    $nombre=$_POST["Nombre"];
    $duracionAnios=$_POST["Anios"];

          #COMPRUEBA LAS CANTIDADES MINIMAS DE DIGITOS QUE DEBE CONTENER
    if (strlen($nombre) < 3 ){

        header("Location:listado.php?mj=".ERROR_LONGITUD_NAME_CODE);
        exit;
    }

    if((!preg_match("/[a-zA-Z ]{2,254}/",$nombre))){
        header("Location:listado.php?mj=assssd");
        exit;
    };


    
    if((!preg_match("/^\d*$/",$duracionAnios))){
        header("Location:listado?mj=".ERROR_DNI_NUMBER_CODE );
        exit;   
    } 

    $carrera=new Carrera();
    $carrera->setIdCarrera($idCarrera);
    $carrera->setNombre($nombre);
    $carrera->setDuracionAnios($duracionAnios);

    $carrera->modificar();

    if ($carrera){
        header("Location:listado.php?mj=".CORRECT_UPDATE_CODE."&idCiclo=".$idCicloLectivo);
    }

?>