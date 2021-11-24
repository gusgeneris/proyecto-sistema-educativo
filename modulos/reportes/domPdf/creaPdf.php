<?php 
    ob_start();
    require_once "../../../class/Carrera.php";
    require_once "../../../class/Materia.php";
    require_once "../../../class/DetalleLibroTemas.php";
    require_once "../../../class/Clase.php";
    require_once "../../../class/CicloLectivo.php";

    
    $idCicloLectivo=CicloLectivo::obtenerIdCicloPorAnio(date("Y"));
    
    $cicloLectivo=CicloLectivo::obtenerTodoPorId($idCicloLectivo);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
       

            .conteiner {
                width: 700px;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }

            .conteinerAsistencia {
                width: 400px;
                margin: 10px 180px;
                margin-left: 30%;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }

            .conteiner3Columnas {
                width: 700px;
                margin: 30px auto;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }

            .conteiner3Columnas.libroTemas {
                margin-left: 700px;
            }

            h1 {
                padding: 20px;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }

            .titulo {
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
                font-size: 12px;
                text-align: left;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }

            span{
                color:red;
            }

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
    <?php
        $idCurriculaCarrera = $_GET['idCurriculaCarrera'];

        $idCarrera=$_GET['idCarrera'];
        $carrera=Carrera::listadoPorId($idCarrera);
        $nombreCarrera=$carrera->getNombre();

        $idMateria=$_GET['idMateria'];
        $materia=Materia::listadoPorId($idMateria);
        $nombreMateria=$materia->getNombre();

        $listadoDetalleLibro= DetalleLibroTemas::detalleLibroPorCurriculaCarrera($idCurriculaCarrera);
    ?>

        <div class="titulo">
            <h1>Libro de temas <h1>
        </div>


        <div class="subtitulo">
            <h2>Carrera: <span> <?php echo $nombreCarrera?></span></h2>
            <h2>Materia: <span> <?php echo $nombreMateria?></span></h2>
            <h2>Ciclo lectivo: <span> <?php echo $cicloLectivo?></span></h2>
        </div>

        

        <div class="conteiner" > 
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

    $filename="reporte.pdf";

    $dompdf->stream($filename,array("Attachment"=>false));

?>