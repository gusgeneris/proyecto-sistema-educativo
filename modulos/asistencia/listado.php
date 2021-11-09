<?php 
    require_once "../../class/CicloLectivo.php";
    require_once "../../class/Carrera.php";
    require_once "../../class/Docente.php";
    require_once "../../class/TipoClase.php";
    require_once "../../class/Clase.php";
    require_once "../../class/Alumno.php";
    require_once "../../class/EstadoAsistencia.php";
    require_once "../../mensaje.php";

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
                <h1 class="titulo">Busqueda de Asistencia</h1>
            </div>

            <div class="main">
                <form action="procesar_busqueda_clase.php" method="POST" class="formInsertUnaColumna" id="formInsert" name="formInsert">

                    <input type="hidden" value="<?php echo $idDocente ?>">

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
                        <button class="formButton" id="Guardar" type="submit" > Buscar Clases </button>
                    </div> 

                </form>
            </div>

        </div>

        <?php if (isset($_GET['idCurriculaCarrera'])){
                    $idCurriculaCarrera = $_GET['idCurriculaCarrera'];
                    
                    $listaDeClases= Clase::listadoPorIdCurriculaCarrera($idCurriculaCarrera);
        ?>
                
            <div class="formGrupBtnEnviar">
                <button class="formButton" id="Guardar"><a href="reporte_asistencias.php?idCurriculaCarrera=<?php echo $idCurriculaCarrera ?>">Reporte de asistencia</a></button>
            </div>
       
            <div class="conteiner3Columnas">
            <table class="tabla">
                <thead>
                    <tr>
                        <th>Numero de Clase</th>
                        <th>Fecha</th>    
                        <th>Listado de Asistencia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listaDeClases as $clase): ?>
                    <tr>
                        <td><?php echo $clase->getNumeroClase(); ?></td>
                        <td><?php echo $clase->getFechaClase(); ?></td>
                        <td>
                            <a href="listado.php?idClaseAsistencia=<?php echo $clase->getIdClase(); ?>">
                                <img class="icon-a" src="../../icon/listado.png" title="Asistencia" alt="Asistencia">
                            </a>                    
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <?php }; ?>


            <?php if (isset($_GET['idClaseAsistencia'])){
                    $idClase = $_GET['idClaseAsistencia'];
                    
                    $listado= Alumno::listadoPorIdClase($idClase);
            ?>
                
            <div class="conteiner3Columnas">
                <table class="tabla" id="table">
                    <thead>
                        <tr>
                            <th>Estado de Asistencia</th>
                            <th>Nombre</th>
                            <th>Apellido</th>    
                            <th>Dni</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listado as $alumno): ?>

                        <tr>
                            <td>
                                <?php  
                                    $idAlumno= $alumno->getIdAlumno();
                                    $estadoAsistencia=EstadoAsistencia::descripcionEstadoAsistencia($idClase,$idAlumno);
                                    echo $estadoAsistencia->getDescripcion();
                                ?>
                            </td>
                            <td><?php echo $alumno->getNombre(); ?></td>
                            <td><?php echo $alumno->getApellido(); ?></td>
                            <td><?php echo $alumno->getDni(); ?></td>
                            
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <?php }; ?>
            
            <?php require_once "../../footer.php"?>    
    </body>

    <script src="../../script/estadoAsistencia.js"></script>
</html>
