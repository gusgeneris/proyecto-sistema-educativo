<?php
    require_once "../../class/Mysql.php";
    require_once "../../class/Carrera.php";
    require_once "../../configs.php";

    $cancelar= $_POST['Cancelar'];

    if(isset($_POST["cboCarrera"])){
        $idCicloLectivo=$_POST["IdCiclo"];
        $idCarrera=$_POST["cboCarrera"];
        $carrera=new Carrera();
        $dato=$carrera->asignarCiclo($idCicloLectivo,$idCarrera);
        
        if($dato==1){
            header("Location:listado_por_ciclo.php?idCiclo=".$idCicloLectivo."&"."mj=".CORRECT_INSERT_CODE);
            }
        else{
            header("Location:listado_por_ciclo.php?idCiclo=".$idCicloLectivo."&"."mj=".INCORRECT_INSERT_MENSAJE_CARRERA_DUPLICATE_CODE);
            
        }
        exit;
    }

    if($cancelar==true){
        header("Location:listado.php?idCiclo=".$idCicloLectivo);
        exit;
    }
?>