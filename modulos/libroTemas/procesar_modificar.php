<?php
    require_once "../../class/DetalleLibroTemas.php";

   

    $idCurriculaCarrera=$_POST["idCurriculaCarrera"];
    $idDetalle=$_POST["idDetalle"];

    $temaDia=$_POST["temaDia"];
    $observaciones=$_POST["observaciones"];

    $detalle=new DetalleLibroTemas();

    $detalle->setIdDetalleLibroTemas($idDetalle);
    $detalle->setTemaDia($temaDia);
    $detalle->setObservaciones($observaciones);
    $detalle->modificar();

    if (isset($_POST['idClase'])):
        $idClase=$_POST["idClase"];
        header("Location:../asistencia/insert.php?idClase=". $idClase."&idCurriculaCarrera=".$idCurriculaCarrera);
        exit;
    endif;

    header("Location:../libroTemas/listado.php?idCurriculaCarrera=".$idCurriculaCarrera);

?>