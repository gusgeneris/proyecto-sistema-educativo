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
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link rel="icon" type="image/jpg" href="../../image/logo.png">
    <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <link rel="stylesheet" href="../../style/mensaje.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <script src ="../../script/comboCarrera.js"></script>
    <title>Busqueda de Clases</title>
</head>
<body>

    <?php 
        require_once "../../menu.php";
        require_once "../../mensaje.php";
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
        <form action="procesar_listado.php" method="POST" class="formInsert3Columnas" id="formInsert" name="formInsert">

            <div class="formGrup" id="GrupocboCarrera">
                <label for="cboCarrera" class="formLabel">Carrera</label>
                    <div class="formGrupInput">
                        <select name="cboCarrera"  class="formInput" id="cboCarrera" onchange="cargarMaterias()">

                            <option value="0">
                                Seleccionar Carrera
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

                        <select name="cboMateria"  class="formInput" id="cboMateria" onchange="cargarNumeroClase()">

                            <option value="0">
                                Seleccionar Materia
                            </option>

                        </select>
                    </div>
                    <p class="formularioInputError"> Debe seleccionar una opcion. </p> 
            </div>           
                    
            <div class="formGrupBtnEnviar3Columnas">                       
                <button class="formButton" value="FormInsertAsistencia" id="Guardar" type="submit" > Buscar </button>
            </div>                        
        </form>
    </div>

</div>

<?php if (isset($_GET['idCurriculaCarrera'])){
            $idCurriculaCarrera = $_GET['idCurriculaCarrera'];

            $idCarrera=$_GET['idCarrera'];
            $carrera=Carrera::listadoPorId($idCarrera);
            $nombreCarrera=$carrera->getNombre();

            $idMateria=$_GET['idMateria'];
            $materia=Materia::listadoPorId($idMateria);
            $nombreMateria=$materia->getNombre();
            
            $listadoDetalleLibro= DetalleLibroTemas::detalleLibroPorCurriculaCarrera($idCurriculaCarrera);
?>

   

    <div class="subtitulo">     
        <h1>Detalle Libro Temas <br> Materia: <span> <?php echo $nombreMateria ?> </span> <br> Carrera: <span><?php echo $nombreCarrera ?></span></h1>
    </div>

    <div class="formGrupBtnEnviar central">
        <button class="formButton" id="Buscar"><a href="../reportes/domPdf/creaPdf.php?idCarrera=<?php echo $idCarrera ?>&idMateria=<?php echo $idMateria?>&idCurriculaCarrera=<?php echo $idCurriculaCarrera?>">Exportar a PDF</a></button>
    </div>

    <div class="conteiner3Columnas" > 
        <table class="tabla">
            <thead>
                <tr>
                    <th>Actividad del dia</th>
                    <th>Observaciones</th>    
                    <th>Numero Clase</th>
                    <th>Fecha Clase</th>
                    <th>Acciones</th>
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
                    <td>
                        <a href="modificar.php?idMateria=<?php echo $idMateria ?>&idCarrera=<?php echo $idCarrera ?>&idDetalleLibro=<?php echo $detalleLibro->getIdDetalleLibroTemas() ?>&idCurriculaCarrera=<?php echo $idCurriculaCarrera ?>"><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        <?php }; ?>
    </div>
    <?php require_once "../../footer.php"?> 
</body>


<script type="text/javascript" src="../../script/validacionFormInsert.js"></script>
</html>