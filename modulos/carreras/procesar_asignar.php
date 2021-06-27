<?php
    require_once "../../class/Mysql.php";
    require_once "../../class/Carrera.php";
    require_once "../../configs.php";

    $cancelar= $_POST['Cancelar'];

    if(isset($_POST["Carrera"])){
        $idCicloLectivo=$_POST["IdCiclo"];
        $idCarrera=$_POST["Carrera"];
        $carrera=new Carrera();
        $carrera->asignarCiclo($idCicloLectivo,$idCarrera);
        header("Location:listado_por_ciclo.php?idCiclo=".$idCicloLectivo);
        exit;

    }

    if($cancelar==true){
        header("Location:listado.php?idCiclo=".$idCicloLectivo);
        exit;
    }

    
    if ($carrera){
        header("Location:listado_por_ciclo.php?mj=".CORRECT_INSERT_CODE."&idCiclo=".$idCicloLectivo);
    }
?>