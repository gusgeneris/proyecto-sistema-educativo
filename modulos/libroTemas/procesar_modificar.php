<?php
    require_once "../../class/DetalleLibroTemas.php";
    require_once "../../configs.php";

   

    $idCurriculaCarrera=$_POST["idCurriculaCarrera"];
    $idDetalle=$_POST["idDetalle"];
    $idClase=$_POST["idClase"];
    $idMateria=$_POST["idMateria"];
    $idCarrera= $_POST['idCarrera'];

    $temaDia=$_POST["temaDia"];
    $observaciones=$_POST["observaciones"];

    $detalle=new DetalleLibroTemas();

    $detalle->setIdDetalleLibroTemas($idDetalle);
    $detalle->setTemaDia($temaDia);
    $detalle->setObservaciones($observaciones);
    $detalle->modificar();

    if (isset($_POST['idClase'])):
        $idClase=$_POST["idClase"];
        
        header("Location:../../modulos/libroTemas/insert.php?idCarrera=".$idCarrera."&idMateria=".$idMateria."&mj=".CORRECT_INSERT_CODE."&idClase=".$idClase."&idCurriculaCarrera=".$idCurriculaCarrera);
    
        exit;
    endif;

    
    header("Location:../libroTemas/listado.php?idCarrera=".$idCarrera."&idMateria=".$idMateria."&mj=".CORRECT_INSERT_CODE."&idCurriculaCarrera=".$idCurriculaCarrera);

?>