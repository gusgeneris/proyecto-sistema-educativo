<?php
ob_start();

require_once "../../../class/Alumno.php";
require_once "../../../class/Carrera.php"; 
require_once "../../../class/CicloLectivo.php"; 

$idCicloLectivo=$_GET['idCicloLectivo'];
$idCarrera=$_GET["idCarrera"];
$idCicloLectivoCarrera=Carrera::idCicloLectivoCarrera($idCicloLectivo,$idCarrera);
$carrera=Carrera::listadoPorId($idCarrera);
$idCicloLectivo=$_GET['idCicloLectivo'];
$cicloLectivo=CicloLectivo::obtenerTodoPorId($idCicloLectivo);
$listadoAlumnosAsignados=Alumno::listadoAlumnosAsignados($idCicloLectivoCarrera);

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
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
                font-family: verdana;
                text-align: center;
                background-color: #ffffff;
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

        <div class="">
            <img src="http://localhost/proyecto-modulos/modulos/reportes/domPdf/logoo_frase2.png" alt="">
        </div><br>
            
        <div class="titulo">
            <h1>Listado de alumnos <h1>
        </div>

        <div class="subtitulo">
            <h2>Carrera: <span> <?php echo $carrera->getNombre()?> </span></h2>
            <h2>Ciclo lectivo: <span> <?php echo $cicloLectivo->getAnio()?> </span></h2>
        </div>
            
        <div class="conteiner3Columnas">
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Dni</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($listadoAlumnosAsignados as $alumno):?>
                    <tr>
                        <td>
                            <?php echo $alumno->getNombre(); ?>
                        </td>
                        <td>
                            <?php echo $alumno->getApellido(); ?>
                        </td>
                        <td>
                            <?php echo $alumno->getDni(); ?>
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