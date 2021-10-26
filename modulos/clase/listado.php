<?php 
    require_once "../../class/CicloLectivo.php";
    require_once "../../class/Carrera.php";
    require_once "../../class/Docente.php";
    require_once "../../class/TipoClase.php";
    require_once "../../class/Clase.php";
    require_once "../../class/Alumno.php";
    require_once "../../class/EstadoAsistencia.php";

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
    <form action="procesar_busqueda_clase.php" method="POST">

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

        
    <button type="submit" > Buscar Clases </button>

    </form>

</div>

<?php if (isset($_GET['idCurriculaCarrera'])){
            $idCurriculaCarrera = $_GET['idCurriculaCarrera'];
            
            $listaDeClases= Clase::listadoPorIdCurriculaCarrera($idCurriculaCarrera);
?>
        

<table border="1" cellspacing="0" cellpadding="">
            <tr>
                <th>Numero de Clase</th>
                <th>Fecha</th>    
                <th>Tipo de clase</th>
            </tr>

            <?php foreach ($listaDeClases as $clase): ?>

            <tr>
                <td><?php echo $clase->getNumeroClase(); ?></td>
                <td><?php echo $clase->getFechaClase(); ?></td>
                <td>
                    <a href="detalle_libro_clase.php?idClase=<?php echo $clase->getIdClase(); ?>">
                        Libro de tema del dia
                    </a> |||
                    <a href="listado.php?idClaseAsistencia=<?php echo $clase->getIdClase(); ?>">
                        Asitencia
                    </a>
                    
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    <?php }; ?>


    <?php if (isset($_GET['idClaseAsistencia'])){
            $idClase = $_GET['idClaseAsistencia'];
            
            $listado= Alumno::listadoPorIdClase($idClase);
    ?>
        

        <table border="1" cellspacing="0" cellpadding="">
            <tr>
                <th>Numero de Clase</th>
                <th>Fecha</th>    
                <th>Tipo de clase</th>
            </tr>

            <?php foreach ($listado as $alumno): ?>

            <tr>
                <td><?php echo $alumno->getNombre(); ?></td>
                <td><?php echo $alumno->getApellido(); ?></td>
                <td>
                <?php  
                        $idAlumno= $alumno->getIdAlumno();
                        $estadoAsistencia=EstadoAsistencia::descripcionEstadoAsistencia($idClase,$idAlumno);
                        echo $estadoAsistencia->getDescripcion();
                    ?>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    <?php }; ?>



</body>
</html>