<?php 

    ob_start();
    require_once "../../../class/CicloLectivo.php";
    require_once "../../../class/Carrera.php";
    require_once "../../../class/Docente.php";
    require_once "../../../class/Clase.php";
    require_once "../../../class/Alumno.php";
    require_once "../../../class/Asistencia.php";
    require_once "../../../class/EstadoAsistencia.php";
    
    $idCicloLectivo=CicloLectivo::obtenerIdCicloPorAnio(date("Y"));

    $idCurriculaCarrera = $_GET['idCurriculaCarrera'];
    $listadoAlumnos=Alumno::listadoPorIdCurricula($idCurriculaCarrera);
    $nombreCarrera=Carrera::obtenerPorIdCurriculaCarrera($idCurriculaCarrera);
    $cicloLectivo=CicloLectivo::obtenerTodoPorId($idCicloLectivo);
    $nombreMateria=Materia::obtenerNombreMateriaPorCurricula($idCurriculaCarrera);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .conteiner {
            width: 500px;
            
            margin-left: 70px ;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }

            .conteinerAsistencia {
                width: 400px;
                margin: 10px 180px;
                margin-left: 30%;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }

            .conteiner3Columnas {
                width: 500px;
                margin: 30px auto;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }

            .conteiner3Columnas.libroTemas {
                margin-left: 300px;
            }

            h1 {
                padding: 20px;                
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }

            .titulo {
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                text-align: center;
                
            }

            table {
                text-align: left;
                border-collapse: collapse;
                width: 100%;
            }

            th,
            td {
                padding: 10px;
                text-align: center;
            }

            td{
                border-bottom:2px solid #adb2b5;
            }

            thead {
                background-color: #393E46;
                border-bottom: solid 2px #00ADB5;
                color: white
            }

            tbody tr {
                background-color: #ffffff;
                border-bottom: 1px solid #ccc;
            }


            .subtitulo{
                font-size: 11px;
                text-align: left;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }
            span{
                color:red;}

            img{
                position:relative;
                display:flex;
                float:left;
                width:150px;
                z-index: -10000;
            }
        </style>
    </head>
    <body>

    <div>
        
        <div class="">
            <img src="http://localhost/proyecto-modulos/modulos/reportes/domPdf/logoo_frase2.png" alt="">
        </div><br>

        <div class="titulo">
            <h1>Asistencias</h1>
        </div>



        <div class="subtitulo">
            <h2>Carrera: <span> <?php echo $nombreCarrera?></span></h2>
            <h2>Materia: <span> <?php echo $nombreMateria?></span></h2>
            <h2>Ciclo lectivo: <span> <?php echo $cicloLectivo?></span></h2>
        </div>
            
        <div class="conteiner">
            <table class="tabla" id="tablaAsistencia">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>    
                        <th>Dni</th>
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
                            
                            foreach ($listadoReporte as list( $nombre,$apellido,$dni)):
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
                                        <?php echo $cantidadAsistencias; ?> 
                                    </td> 
                                    <td>
                                        <?php echo $porcentajeAsistencia; ?> %
                                    </td>                                        
                                </tr>
                        <?php endforeach;?>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </body>

</html>
<?php
    $html=ob_get_clean();

    require_once "dompdf/autoload.inc.php";

    use Dompdf\Dompdf;

    $dompdf= new Dompdf();

    $options=$dompdf->getOptions();
    $options->set(array('isRemoteEnabled'=>true));
    $dompdf->setOptions($options);

    $dompdf->loadHtml($html);

    $dompdf->setPaper('letter');
    $dompdf->render();

    $filename="reporteCalendarizacion.pdf";

    $dompdf->stream($filename,array("Attachment"=>false));

?>