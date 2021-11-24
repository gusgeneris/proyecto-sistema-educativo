<?php
    require_once "../../class/Clase.php";
    require_once "../../configs.php";  

   

    $idClase=$_POST["idClase"];

    $fechaClase=$_POST["Fecha"];
    $tipoClase=$_POST["cboTipoClase"];
    $idCurriculaCarrera=$_POST["idCurriculaCarrera"];

    $clase=new Clase();

    $clase->setIdClase($idClase);
    $clase->setFechaClase($fechaClase);
    $clase->setTipoClase($tipoClase);

    $clase->modificar();

    if (isset($_POST['idSolicitario'])):
        $idSolicitario = $_POST['idSolicitario'];
        switch ($idSolicitario) {
            case '1':
                $idMateria=$_POST["idMateria"];
                header("Location:../libroTemas/insert.php?mj=".CORRECT_UPDATE_CODE."&idClase=". $idClase."&idMateria=".$idMateria."&idCurriculaCarrera=".$idCurriculaCarrera);
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
