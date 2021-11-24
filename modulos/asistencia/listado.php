<?php 
    require_once "../../class/CicloLectivo.php";
    require_once "../../class/Carrera.php";
    require_once "../../class/Docente.php";
    require_once "../../class/TipoClase.php";
    require_once "../../class/Clase.php";
    require_once "../../class/Alumno.php";
    require_once "../../class/Materia.php";
    require_once "../../class/EstadoAsistencia.php";

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/proyecto-modulos/style/mensaje.css">
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
            require_once "../../mensaje.php";
            
            $idPersona=$usuario->getIdPersona();
            $idDocente=Docente::obtenerPorIdPersona($idPersona);
            $anio=date("Y");
            $idCicloLectivo = CicloLectivo::obtenerIdCicloPorAnio($anio);
            $listaCarreras = Carrera::listaCarrerasPorDocente($idDocente,$idCicloLectivo);
            $nombreCarrera="";
        ?>
        

        <div>
            <div class="titulo">
                <h1 class="titulo">Busqueda de Asistencia</h1>
            </div>

            <div class="main">
                <form action="procesar_busqueda_clase.php" method="POST" class="formInsert3Columnas" id="formInsert" name="formInsert">

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
                                    <?php echo $nombreCarrera=$carrera->getNombre() ?>
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
                    
                    <div class="formMensaje" id="GrupoMensaje">
                    
                        <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
            
                    </div>
                    
                    <div class="formGrupBtnEnviar3Columnas"> 
                        <button class="formButton" id="Guardar" value="FormInsertAsistencia" type="submit" > Buscar  </button>
                    </div> 

                </form>
            </div>

        </div>
        
        
        <?php if(isset($_GET['idClaseAsistencia'])){
            
            $idClase = $_GET['idClaseAsistencia'];
            
            $listado= Alumno::listadoPorIdClase($idClase);
             if(empty($listado)):
            
                $idCurriculaCarrera=$_GET['idCurricula']; ?>
                    <div class="titulo">
                        <h2>Asistencia inexistente</h2>
                    </div><br>
                    <div class="formGrupBtnEnviarUnaColumna informeAsistencia">
                        <button class="formButton" id="Guardar"><a target="_blank" href="../asistencia/insert.php?idCurriculaCarrera=<?php echo $idCurriculaCarrera ?>&idClase=<?php echo $idClase ?>">Agregar Asistencia</a></button>
            </div>

                       
                <?php exit; endif;  ?>
            <?php };  ?>

        <?php if (isset($_GET['idCurriculaCarrera'])){
                    $idCurriculaCarrera = $_GET['idCurriculaCarrera'];
                    $idMateria=$_GET['idMateria'];

                    $materia=Materia::listadoPorId($idMateria);
                    $nombreMateria = $materia->getNombre();
                    
                    $listaDeClases = Clase::listadoPorIdCurriculaCarrera($idCurriculaCarrera);

        ?>
            <div class="subtitulo">
                <h2>Listado de Asistencias de la Carrera: <span> <?php echo $nombreCarrera ?></span><br> Materia: <span><?php echo $nombreMateria?></span> </h2>
            </div>
                
            <div class="formGrupBtnEnviarUnaColumna informeAsistencia">
                <button class="formButton" id="Guardar"><a target="_blank" href="../reportes/domPdf/reporte_asistencia.php?idCurriculaCarrera=<?php echo $idCurriculaCarrera ?>">Reporte de asistencia</a></button>
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
                            <a href="listado.php?idCurricula=<?php echo $idCurriculaCarrera?>&idClaseAsistencia=<?php echo $clase->getIdClase(); ?>">
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
<script type="text/javascript" src="../../script/validacionFormInsert.js"></script>
</html>
