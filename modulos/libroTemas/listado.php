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
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
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
    <div class="titulo">
        <h1 class="titulo">Buscar Libro de Temas</h1>
    </div>

    <div class="main">
        <form action="procesar_listado.php" method="POST" class="formInsertUnaColumna" id="formInsert" name="formInsert">

            <div class="formGrup" id="GrupocboCarrera">
                <label for="cboCarrera" class="formLabel">Carrera</label>
                    <div class="formGrupInput">
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
                    </div>
                        <p class="formularioInputError"> Debe seleccionar una opcion. </p> 
            </div>
            
            <div class="formGrup" id="GrupocboMateria">
                <label for="cboMateria" class="formLabel">Materia</label>
                    <div class="formGrupInput">

                        <select name="cboMateria" id="cboMateria" onchange="cargarNumeroClase()">

                            <option value="0">
                                ->Seleccionar Materia<-
                            </option>

                        </select>
                    </div>
                    <p class="formularioInputError"> Debe seleccionar una opcion. </p> 
            </div>           
                    
            <div class="formGrupBtnEnviar">                       
                <button class="formButton" id="Guardar" type="submit" > Buscar Libro </button>
            </div>                        
        </form>
    </div>

</div>

<?php if (isset($_GET['idCurriculaCarrera'])){
            $idCurriculaCarrera = $_GET['idCurriculaCarrera'];
            
            $listadoDetalleLibro= DetalleLibroTemas::detalleLibroPorCurriculaCarrera($idCurriculaCarrera);
?>
    <div class="subtitulo">     
        <h2>Detalle Libro Temas</h2>
    </div>
    <div class="conteiner3Columnas" > 
        <table class="tabla">
            <thead>
                <tr>
                    <th>Actividad del dia</th>
                    <th>Observaciones</th>    
                    <th>Numero Clase</th>
                    <th>Fecha Clase</th>
                </tr>
            </thead>

            <?php foreach ($listadoDetalleLibro as $detalleLibro): ?>
            <tbody>    
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
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        <?php }; ?>
    </div>

</body>
</html>