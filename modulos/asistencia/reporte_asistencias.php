<?php 
    require_once "../../class/CicloLectivo.php";
    require_once "../../class/Carrera.php";
    require_once "../../class/Docente.php";
    require_once "../../class/TipoClase.php";
    require_once "../../class/Clase.php";
    require_once "../../class/Alumno.php";
    require_once "../../class/Asistencia.php";
    require_once "../../class/EstadoAsistencia.php";

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
        <link rel="icon" type="image/jpg" href="../../image/logo.png">
        <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
        <link rel="stylesheet" href="../../style/menuVertical.css">
        <script src="../../jquery3.6.js"></script>
        <script type="text/javascript" src="../../script/menu.js" defer> </script>
        <script src ="../../script/comboCarrera.js"></script>
        <title>Busqueda de Reporte de Asistencias</title>
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
                <h1 class="titulo">Busqueda de  Reportes de Asistencias</h1>
            </div>

            <div class="main">
                <form action="procesar_busqueda_asistencia.php" method="POST" class="formInsert3Columnas" id="formInsert" name="formInsert">

                    <input type="hidden" value="<?php echo $idDocente ?>">

                    <div class="formGrup" id="GrupocboCarrera">
                        <label for="cboCarrera" class="formLabel">Carrera</label>
                        <div class="formGrupInput">
                            <select name="cboCarrera" class="formInput" id="cboCarrera" onchange="cargarMaterias()">
                                
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
                                <select name="cboMateria" class="formInput" id="cboMateria" onchange="cargarNumeroClase()">

                                    <option value="0">
                                        ->Seleccionar Materia<-
                                    </option>

                                </select>
                            </div>
                            <p class="formularioInputError"> Debe seleccionar una opcion. </p> 
                    </div>                  
                    
                    <div class="formGrupBtnEnviar3Columnas"> 
                        <button class="formButton" id="Guardar" value="FormInsertAsistencia" type="submit" > Buscar</button>
                    </div> 

                </form>
            </div>

        </div>

        <?php if (isset($_GET['idCurriculaCarrera'])){
                    $idCurriculaCarrera = $_GET['idCurriculaCarrera'];
                    $listadoAlumnos=Alumno::listadoPorIdCurricula($idCurriculaCarrera);
                    $nombreCarrera=Carrera::obtenerPorIdCurriculaCarrera($idCurriculaCarrera);
                    $nombreMateria=Materia::obtenerNombreMateriaPorCurricula($idCurriculaCarrera);
            ?>
            <div class="subtitulo">
                <h2>Reporte Asistencia </h2>
                <h2>Carrera: <span> <?php echo $nombreCarrera?></span></h2>
                <h2>Materia: <span> <?php echo $nombreMateria?></span></h2>
            </div>
                
            <div class="conteiner3Columnas">
                <table class="tabla" id="tablaAsistencia">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>    
                            <th>Dni</th>
                            <th>Cantidad de Faltas</th>
                            <th>Cantidad de Asistencia</th>
                            <th>Porcentaje de Asistencia</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listadoAlumnos as $alumno): 
                                $idAlumno=$alumno->getIdAlumno(); 
                                $listadoReporte=Asistencia::reporteInasistencia($idAlumno,$idCurriculaCarrera);
                                $cantidadAsistencias=Asistencia::reporteAsistencia($idAlumno,$idCurriculaCarrera);
                                $cantidadClases=Clase::cantidadClasePorIdCurriculaCarrera($idCurriculaCarrera);
                                $porcentajeAsistencia=Asistencia::porcentajeAsistencia($cantidadClases,$cantidadAsistencias);
                                
                                foreach ($listadoReporte as list( $nombre,$apellido,$dni,$cantidadFaltas)):
                         ?>
                                    <tr>
                                        <td>
                                            <?php  echo $nombre; ?>
                                        </td>

                                        <td>
                                            <?php echo $apellido; ?>
                                        </td>
                                        <td>
                                            <?php echo $dni; ?>
                                        </td>
                                        <td>
                                            <?php echo $cantidadFaltas; ?>
                                        </td> 
                                        <td>
                                            <?php echo $cantidadAsistencias; ?> 
                                        </td> 
                                        <td>
                                            <?php echo $porcentajeAsistencia; ?> 
                                        </td>                                        
                                    </tr>
                            <?php endforeach;?>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <?php }; ?>
    </body>

    <script src="../../script/porcentajeAsistencia.js"></script>
<script type="text/javascript" src="../../script/validacionFormInsert.js"></script>
</html>
