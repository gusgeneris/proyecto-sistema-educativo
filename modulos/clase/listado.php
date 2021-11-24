<?php 
    require_once "../../class/CicloLectivo.php";
    require_once "../../class/Carrera.php";
    require_once "../../class/Materia.php";
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
        <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
        <link rel="stylesheet" href="../../style/styleFormInsert.css">
        <link rel="icon" type="image/jpg" href="../../image/logo.png">
        <script type="text/javascript" src="../../script/validacion.js"></script>
        <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
        <link rel="stylesheet" href="../../style/menuVertical.css">
        <link rel="stylesheet" href="../../style/mensaje.css">
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
        ?>
        

        <div class="titulo"><h1>Busqueda de Clase</h1></div>
    <div class="main">
        <form action="procesar_busqueda_clase.php" method="POST" class="formInsert3Columnas" id="formInsert" name="formInsert">

            <div class="formGrup" id="GrupocboCarrera">
                    <label for="cboCarrera" class="formLabel">Carrera</label>
                        <div class="formGrupInput">
                            <select name="cboCarrera" class="formInput" id="cboCarrera" onchange="cargarMaterias()">

                                <option value="0">
                                    Seleccionar Carrera
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
                    <select name="cboMateria" class="formInput" id="cboMateria" onchange="cargarNumeroClase()">

                        <option value="0">
                            Seleccionar Materia
                        </option>
                    </select>
                </div>
                    <p class="formularioInputError"> Debe seleccionar una opcion. </p> 
            </div>

            <div class="formGrupBtnEnviar3Columnas">    
                <button type="submit" id="Guardar" value="FormInsertAsistencia" class="formButton"> Buscar </button>
            </div>                            
        </form>

    </div>

    <?php if (isset($_GET['idCurriculaCarrera'])){
           
            $idCarrera=$_GET['idCarrera'];
            $carrera=Carrera::listadoPorId($idCarrera);
            $nombreCarrera=$carrera->getNombre();

            $idMateria=$_GET['idMateria'];
            $materia=Materia::listadoPorId($idMateria);
            $nombreMateria=$materia->getNombre();

            $idCurriculaCarrera = $_GET['idCurriculaCarrera'];
            
            $listaDeClases= Clase::listadoPorIdCurriculaCarrera($idCurriculaCarrera);
    ?>
            <div class="subtitulo">
                <h1>Listado de Clases de la Materia: <span> <?php echo $nombreMateria ?> </span> <br> Carrera: <span><?php echo $nombreCarrera ?></span></h1>
            </div>

        <div class="conteiner3Columnas" >
            <table class="tabla" >
                <thead>
                    <tr>
                        <th>Numero de Clase</th>
                        <th>Fecha de Clase</th>  
                        <th>Tipo de Clase</th>  
                        <th>Libro de tema/Asistencia</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($listaDeClases as $clase): ?>
                    <tr>
                        <td><?php echo $clase->getNumeroClase(); ?></td>
                        <td><?php echo $clase->getFechaClase(); ?></td>
                        <td><?php echo $clase->getTipoClase(); ?></td>
                        <td>
                            <div class="icon">
                                <a href="modificar.php?id=3&idCurriculaCarrera=<?php echo $idCurriculaCarrera ?>&idClase=<?php echo $clase->getIdClase(); ?>"><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                                <a href="detalle_libro_clase.php?idMateria=<?php echo $idMateria; ?>&idCarrera=<?php echo $idCarrera; ?>&idClase=<?php echo $clase->getIdClase(); ?>"><img class="icon-a" src="../../icon/ejeContenido.png" title="Libro de Temas" alt="Libro de Temas"></a> 
                                <a href="listado.php?idMateria=<?php echo $idMateria; ?>&idCarrera=<?php echo $idCarrera; ?>&idClaseAsistencia=<?php echo $clase->getIdClase(); ?>"><img class="icon-a" src="../../icon/listado.png" title="Asistencia" alt="Asistencia"></a>
                            </div>
                            
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

            $idCarrera=$_GET['idCarrera'];
            $carrera=Carrera::listadoPorId($idCarrera);
            $nombreCarrera=$carrera->getNombre();

            $idMateria=$_GET['idMateria'];
            $materia=Materia::listadoPorId($idMateria);
            $nombreMateria=$materia->getNombre();
        ?>
            <div class="subtitulo">
                <h1>Asistencia: <span> <?php echo $nombreMateria ?> </span> <br> Carrera: <span><?php echo $nombreCarrera ?></span></h1>
            </div>
            <div class='guia'>
                <div class="guiaColor"></div>
                <h3>Cumple con el 75% de asistencia</h3>
            </div>
            <div class="conteiner3Columnas">
                <table class="tabla" id="table">
                    <thead>
                        <tr>   
                            <th>Asistencia</th>
                            <th>Nuombre</th>
                            <th>Apellido</th> 
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
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="formGrupBtnEnviar central">
                <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false;">Atras</button>
            </div>
        <?php }; ?>
        
    <?php require_once "../../footer.php"?>   

    </body>
      
    <script src="../../script/estadoAsistencia.js"></script>
    
    <script type="text/javascript" src="../../script/validacionFormInsert.js"></script>
</html>