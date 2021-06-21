<?php
    require_once "../../class/Mysql.php";
    require_once "../../class/Carrera.php";
    require_once "../../configs.php";

    $cancelar= $_POST['Cancelar'];
    $idCicloLectivo=$_POST["IdCiclo"];

    if($cancelar==true){
        header("Location:listado.php?idCiclo=".$idCicloLectivo);
        exit;
    }

    $carreraNombre=$_POST["Nombre"];
    $carreraAnioDuracion=$_POST["AnioDuracion"];

    $carrera=new Carrera();
    $carrera->setNombre($carreraNombre);
    $carrera->setDuracionAnios($carreraAnioDuracion);

    $carrera->insert();
    $carrera->crearRelacionConCicloLectivo($idCicloLectivo);

    if ($carrera){
        header("Location:listado.php?mj=".CORRECT_INSERT_CODE."&idCiclo=".$idCicloLectivo);
    }
?>