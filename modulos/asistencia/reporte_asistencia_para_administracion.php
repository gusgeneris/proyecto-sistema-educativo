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
        <script src ="../../jquery3.6.js"></script>
        <script src ="../../script/comboCarrera.js"></script>
        <title>Busqueda de Clases</title>
    </head>
    <body>

        <?php 
            require_once "../../menu.php";
        ?>
        

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
</html>