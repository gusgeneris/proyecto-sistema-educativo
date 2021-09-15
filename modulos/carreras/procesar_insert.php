<?php
    require_once "../../class/Mysql.php";
    require_once "../../class/Carrera.php";
    require_once "../../configs.php";

    $cancelar= $_POST['Cancelar'];

    if($cancelar==true){
        header("Location:listado.php?idCiclo=".$idCicloLectivo);
        exit;
    }

    $carreraNombre=$_POST["Nombre"];
    $carreraAnioDuracion=$_POST["Anios"];
    $validacionNombre= "/^[a-zA-Z ]{2,254}$/";

    

        #COMPRUEBA LAS CANTIDADES MINIMAS DE DIGITOS QUE DEBE CONTENER
    if (strlen($carreraNombre) < 3 ){

        header("Location:listado.php?mj=".ERROR_LONGITUD_NAME_CODE);
        exit;
    }


    if((!preg_match("/[a-zA-Z ]{2,254}/",$carreraNombre))){
        header("Location:listado.php?mj=errorNombre");
        exit;
    };

    
    if((!preg_match("/^\d*$/",$carreraAnioDuracion))){
        header("Location:listado?mj=".ERROR_DNI_NUMBER_CODE );
        exit;   
    } 

    $carrera=new Carrera();
    $carrera->setNombre($carreraNombre);
    $carrera->setDuracionAnios($carreraAnioDuracion);

    $carrera->insert();

    if ($carrera){
        header("Location:listado.php?mj=".CORRECT_INSERT_CODE."&idCiclo=".$idCicloLectivo);
    }
?>