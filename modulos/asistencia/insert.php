<?php
    require_once "../../class/Alumno.php";
    require_once "../../class/CicloLectivo.php"; 
    require_once "../../class/DetalleLibroTemas.php";    
    require_once "../../class/Materia.php";   
    require_once "../../class/Clase.php";


    $idClase=$_GET["idClase"];
    $idCurriculaCarrera=$_GET["idCurriculaCarrera"];
    
    $idCicloLectivoCarrera=CicloLectivo::obtenerIdCicloLectivoCarreraPorCurricula($idCurriculaCarrera);
    
    $idMateria=Materia::obtenerIdMateriaPorCurricula($idCurriculaCarrera);
 
    $clase=Clase::mostrarPorId($idClase);
    
    $listado=Alumno::listadoPorIdCurriculaCarrera($idCicloLectivoCarrera,$idMateria);
    $detalleLibro=DetalleLibroTemas::detallePorIdCurriculaIdClase($idCurriculaCarrera,$idClase);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Asistencia</title>
</head>
<body>

    
    <div>
        <table>
            <caption> Libro de Temas </caption>
            <tr>
                <th>
                    Tema del dia: <?php echo $detalleLibro->getTemaDia() ?>
                </th> 
                <th>
                   || Observaciones: <?php echo $detalleLibro->getObservaciones() ?>
                </th>
                <th>
                   || Firma observante: 
                </th>
            </tr>
        </table>
    </div>

    <div>
        <table>
            <caption> Clase </caption>
            <tr>
                <th>
                    Numero Clase: <?php echo $clase->getNumeroClase() ?>
                </th> 
                <th>
                    Fecha: <?php echo $clase->getFechaClase() ?>
                </th>
                <th>
                    Tipo de Clase: <?php echo $clase->getTipoClase() ?>
                </th>
            </tr>
        </table>
    </div>
    
    <form action="procesar_insert.php" method="POST">

    <input type="hidden" name="idClase" value="<?php echo $idClase ?>">
    <input type="hidden" name="idMateria" value="<?php echo $idMateria ?>">
    <input type="hidden" name="idCicloLectivoCarrera" value="<?php echo $idCicloLectivoCarrera ?>">
    <input type="hidden" name="idCurriculaCarrera" value="<?php echo $idCurriculaCarrera ?>">

    <table style="border: 1px;">
        <tr>
            <th>Asistencia</th>
            <th>id Alumno</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dni</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($listado as $alumno):?>
            
            <tr>
                <td>
                    <input type="checkbox" name="check_lista[]" value="<?php  echo $alumno->getIdAlumno() ?>">
                </td>
                <td>
                    <?php echo $alumno->getIdAlumno()?>
                </td>
                <td>
                    <?php echo $alumno->getNombre()?>
                </td>
                <td>
                    <?php echo $alumno->getApellido()?>
                </td>
                <td>
                    <?php echo $alumno->getDni()?>
                </td>
                <td>
                    ghdf
                </td>
            </tr>
        <?php endforeach?>
    </table>
        <button type="submit"> Guardar Registro </button>
    </form>

   


    
</body>
</html>