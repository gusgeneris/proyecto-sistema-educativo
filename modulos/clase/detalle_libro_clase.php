<?php 
    require_once "../../class/CicloLectivo.php";
    require_once "../../class/Carrera.php";
    require_once "../../class/Docente.php";
    require_once "../../class/DetalleLibroTemas.php";
    require_once "../../class/Clase.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <script src ="../../jquery3.6.js"></script>
    <script src ="../../script/comboCarrera.js"></script>
    <title>Busqueda de Clases</title>
</head>
<body>

    <?php 
        require_once "../../menu.php";
        $idPersona=$usuario->getIdPersona();
        $idDocente=Docente::obtenerPorIdPersona($idPersona);
        $anio=date("Y");
        $idCicloLectivo = CicloLectivo::obtenerIdCicloPorAnio($anio);
        $listaCarreras = Carrera::listaCarrerasPorDocente($idDocente,$idCicloLectivo);

        if (isset($_GET['idClase'])){
            $idClase = $_GET['idClase'];
            
            $detalle= DetalleLibroTemas::detalleLibroPorClase($idClase);
        }else {
            header("Location:inicio.php");}
    ?>
    

<table border="1" cellspacing="0" cellpadding="">
            <tr>
                <th>Actividad</th>
                <th>Observaciones</th>    
                <th>Acciones</th>
            </tr>

            <tr>
                <td><?php echo $detalle->getTemaDia(); ?></td>
                <td><?php echo $detalle->getObservaciones(); ?></td>
                <td>
                    <a href="">
                        xxxxx
                    </a>
                    
                </td>
            </tr>
        </table>


</body>
</html>