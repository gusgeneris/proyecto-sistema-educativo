<?php 
    require_once "../../class/CicloLectivo.php";
    require_once "../../class/Carrera.php";
    require_once "../../class/Docente.php";
    require_once "../../class/TipoClase.php";
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
    ?>
    

<div>
    <form action="procesar_listado.php" method="POST">

    <select name="cboCarrera" id="cboCarrera" onchange="cargarMaterias()">

        <option value="0">
            ->Seleccionar Carrera<-
        </option>
            <?php foreach ($listaCarreras as $carrera): ?>
        <option value="<?php echo $carrera->getIdCarrera() ?>">
            <?php echo $carrera->getNombre() ?>
        </option>
            <?php endforeach; ?>

    </select>

    <select name="cboMateria" id="cboMateria" onchange="cargarNumeroClase()">

        <option value="0">
            ->Seleccionar Materia<-
        </option>

    </select>



    <button type="submit" > Buscar Libro </button>

    </form>

</div>

<?php if (isset($_GET['idCurriculaCarrera'])){
            $idCurriculaCarrera = $_GET['idCurriculaCarrera'];
            
            $listadoDetalleLibro= DetalleLibroTemas::detalleLibroPorCurriculaCarrera($idCurriculaCarrera);
?>
        

<table border="1" cellspacing="0" cellpadding="">
            <tr>
                <th>Actividad del dia</th>
                <th>Observaciones</th>    
                <th>Numero clase</th>
                <th>Fecha Clase</th>
            </tr>

            <?php foreach ($listadoDetalleLibro as $detalleLibro): ?>

            <tr>
                <td>
                    <?php echo $detalleLibro->getTemaDia(); ?>
                </td>
                <td>
                    <?php echo $detalleLibro->getObservaciones(); ?>
                </td>
                <td>
                    <?php  
                        $idClase= $detalleLibro->getIdClase();
                        
                        $clase=Clase::detalleNumeroFechaClase($idClase);

                        echo $clase->getNumeroClase();
                    ?>
                </td>
                <td>
                    <?php  
                        $idClase= $detalleLibro->getIdClase();
                        
                        $clase=Clase::detalleNumeroFechaClase($idClase);

                        echo $clase->getFechaClase();
                    ?>
                </td>
                <td>
                    <a href="detalle_libro_clase.php?idClase=<?php  ?>">
                        Modificar
                    </a>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    <?php }; ?>

</body>
</html>