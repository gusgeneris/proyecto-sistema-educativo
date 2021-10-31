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
        <link rel="stylesheet" href="../../style/styleFormInsert.css">
        <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
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
            <div class="titulo">
                <h1 class="titulo">Buscar Asistencia</h1>
            </div>

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

        <?php if (isset($_GET['idCurriculaCarrera'])){
                    $idCurriculaCarrera = $_GET['idCurriculaCarrera'];
                    
                    $listaDeClases= Clase::listadoPorIdCurriculaCarrera($idCurriculaCarrera);
        ?>
                

        <table class="table">
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
                

                <table class="tabla" id="table">
                    <tr>
                        <th>Estado de Asistencia</th>
                        <th>Nombre</th>
                        <th>Apellido</th>    
                        <th>Dni</th>
                    </tr>

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
                </table>
            <?php }; ?>
    </body>

    <script src="../../script/estadoAsistencia.js"></script>
</html>
