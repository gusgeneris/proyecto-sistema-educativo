<?php
    require_once "../../class/Clase.php";

   

    $idClase=$_POST["idClase"];

    $numeroClase=$_POST["numeroClase"];
    $fechaClase=$_POST["fechaClase"];
    $tipoClase=$_POST["cboTipoClase"];

    $clase=new Clase();

    $clase->setIdClase($idClase);
    $clase->setFechaClase($fechaClase);
    $clase->setTipoClase($tipoClase);
    $clase->setNumeroClase($numeroClase);

    $clase->modificar();

    if (isset($_POST['idSolicitario'])):
        $idSolicitario = $_POST['idSolicitario'];
        switch ($idSolicitario) {
            case '1':
                $idMateria=$_POST["idMateria"];
                header("Location:../libroTemas/insert.php?idClase=". $idClase."&idMateria=".$idMateria);
                break;
                exit;
            case '2':
                $idCurriculaCarrera=$_POST['idCurriculaCarrera'];
                header("Location:../Asistencia/insert.php?idClase=".$idClase."&idCurriculaCarrera=".$idCurriculaCarrera);
                break;
                exit;
            case '3':
                $idCurriculaCarrera=$_POST['idCurriculaCarrera'];
                header("Location:../../modulos/clase/listado.php?idCurriculaCarrera=".$idCurriculaCarrera);
                exit;
        }
    endif;

?>
