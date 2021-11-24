<?php
ob_start();
require_once "../../../class/DetalleCalendarizacion.php";
require_once "../../../class/Materia.php";
require_once "../../../class/Carrera.php";

$idCurriculaCarrera=$_GET['idCurriculaCarrera'];
$lista = DetalleCalendarizacion::listado($idCurriculaCarrera);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
                margin-left:0px;
                
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

    <body class="body-listuser">

        <div class="">
            <img src="http://localhost/proyecto-modulos/modulos/reportes/domPdf/logoo_frase2.png" alt="">
        </div><br>

            <?php 
                $idCarrera= $_GET ['idCarrera'];
                $idMateria= $_GET ['idMateria'];
                $carrera = Carrera::listadoPorId($idCarrera);
                $nombreCarrera=$carrera->getNombre();

                $materia = Materia::listadoPorId($idMateria);
                $nombreMateria=$materia->getNombre();
            ?>
        <div class="titulo">
            <h1>Calendarizacion</h1>
        </div>



        <div class="subtitulo">
            <h2>Carrera: <span> <?php echo $nombreCarrera?></span></h2>
            <h2>Materia: <span> <?php echo $nombreMateria?></span></h2>
        </div><br>

        <div class="conteiner" >
            <table class="tabla" id="table">
                <thead>
                    <tr >
                        <th> Numero de Clase</th>
                        <th> Fecha Clase</th>
                        <th> Actividad</th>
                        <th> Contenido Priorizado</th>
                        <th> Numero Eje de Contenido</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista as $detalle ):?> 
                    <tr >
                        <td>
                            <?php echo $detalle->getNumeroClase(); ?>
                        </td>
                        <td>
                            <?php echo $detalle->getFechaClase(); ?>
                        </td>
                        <td>
                            <?php echo $detalle->getActividad(); ?>
                        </td>
                        <td>
                            <?php echo $detalle->getContenidoPriorizado(); ?>
                        </td>
                        <td>
                            <?php echo $detalle->getNumeroEjeContenido(); ?>
                        </td>
                       
                    </tr>
                    <?php endforeach ?>
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