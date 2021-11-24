<?php
    require_once "../../class/Clase.php";
    require_once "../../class/Carrera.php";
    require_once "../../class/Materia.php";
    require_once "../../class/LibroTemas.php";
    require_once "../../class/DetalleLibroTemas.php";

    $idClase=$_GET["idClase"];
    $idMateria=$_GET["idMateria"];
    $idCarrera=$_GET["idCarrera"];

    $carrera=Carrera::listadoPorId($idCarrera);
    $nombreCarrera=$carrera->getNombre();

    $idMateria=$_GET['idMateria'];
    $materia=Materia::listadoPorId($idMateria);
    $nombreMateria=$materia->getNombre();

    $idCurriculaCarrera=Clase::obtenerIdCurriculaCarreraPorIdClase($idClase);
    $idLibroTemas=LibroTemas::obtenerIdLibroTemas($idCurriculaCarrera);
    $existencia=LibroTemas::comprobarExistencia($idCurriculaCarrera);

    if ($existencia==0){
        ?> 
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../../style/styleFormInsert.css">
                <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
                <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
                <link rel="stylesheet" href="../../style/menuVertical.css">
                <link rel="stylesheet" href="../../style/mensaje.css">
                <script src="../../jquery3.6.js"></script>
                <script type="text/javascript" src="../../script/menu.js" defer> </script>
                <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Alumnos</title>
                <script type="text/javascript" src="../../script/validacion.js"></script>
            </head>

            <?php require_once "../../menu.php";
            require_once "../../mensaje.php";?>

            <body class="body-listuser">
                <section class="inexistencia">
                    <div class="subtituloExistencia">
                        <h2>No Existe el Libro de Temas para esta materia</h2>
                    </div><br>
                    <label for="">¿Desea agregar un nuevo Libro de temas?</label><br>
                <form action='procesar_nuevo_libro.php' method='POST'>
                    <input type="hidden" name="idClase" value='<?php echo $idClase?>'>
                    <input type="hidden" name="idMateria" value='<?php echo $idMateria?>'>
                    <input type="hidden" name="idCarrera" value='<?php echo $idCarrera?>'>
                    <button  type='submit' name='idCurriculaCarrera' value='<?php echo $idCurriculaCarrera?>'> Agregar Nuevo Libro de Temas  </button>
                </form>
            </section>
            <?php require_once "../../footer.php"?>                    
        </body>

    </html>
        <?php exit;
    }else{
        $clase=Clase::mostrarPorId($idClase);
    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <link rel="stylesheet" href="../../style/mensaje.css">
    <link rel="stylesheet" href="../../style/tabla.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Nuevo Detalle Libro Temas</title>
 
    <title>Libro de temas</title>
</head>



<body>
    <?php require_once "../../menu.php";
    require_once "../../mensaje.php";?>

    <div class="container-detalle-libro">
        <div class="titulo">
            <h1>Crear Registros del Libro de Temas<br> Materia: <span> <?php echo $nombreMateria ?> </span> <br> Carrera: <span><?php echo $nombreCarrera ?></span></h1>
        </div>

        <div class="conteiner-descripcion-clase">
            <div class="subtitulo">
                <h2>Clase Asociada</h2>
            </div>

            <div class="conteiner-btn-modificar">
                <button class="btn-modificar">
                    <a href="../clase/modificar.php?id=1&idClase=<?php echo $idClase ?>&idMateria=<?php echo $idMateria ?>">Modificar</a>
                </button>
            </div>

            <div class="conteiner-h3">
                <h3>
                    Numero Clase: <span><?php echo $clase->getNumeroClase() ?></span>
                </h3>
            </div>

            <div class="conteiner-h3">
                <h3>
                    Fecha: <span><?php echo $clase->getFechaClase() ?></span>
                </h3>
            </div>

            <div class="conteiner-h3">           
                <h3>
                    Tipo de Clase: <span><?php echo $clase->getTipoClase() ?></span>
                </h3>
            </div>

                        
         </div>

        <form action="procesar_insert.php" method="POST"  id="formInsert" class="formInsert2Columnas">

                <input type="hidden" name="idLibroTemas" value="<?php echo $idLibroTemas?>">
                <input type="hidden" name="idCurriculaCarrera" value="<?php echo $idCurriculaCarrera?>">
                <input type="hidden" name="idClase" value="<?php echo $idClase?>">
                <input type="hidden" name="idMateria" value="<?php echo $idMateria?>">
                <input type="hidden" name="idCarrera" value="<?php echo $idCarrera?>">
                
                <div class="formGrup" id="GrupotemaDia" >
                    <label for="TemaDia" class="formLabel">Tema del dia</label>
                    <div class="formGrupInput">
                        <textarea id="temaDia"name="temaDia"  class="formInput"></textarea>
                    </div>
                    <p class="formularioInputError"> Error en el campo tema del dia</p>
                </div>


                <div class="formGrup" id="Grupoobservaciones" >
                    <label for="Obsersaviones" class="formLabel">Observaciones</label>
                    <div class="formGrupInput">
                        <textarea id="observaciones"name="observaciones"  class="formInput"></textarea>
                    </div>
                    <p class="formularioInputError"> Error en el campo Observaciones.</p>
                </div>

                <div class="formMensaje" id="GrupoMensaje">
                        
                    <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
                    
                </div>


                <div class="formGrupBtnEnviarUnaColumna" >
                    <button type="submit" class="formButton" id="Guardar" value ="FormInsertLibroTemas"> Guardar Registro </button>
                </div>
        </form>
    </div>
    <br><br>

    <?php if (isset($_GET['idClase']) && isset($_GET['idCurriculaCarrera'])):

        $idClase=$_GET['idClase'];
        $idCurriculaCarrera=$_GET['idCurriculaCarrera'];
        
        $listaDetalleLibro=DetalleLibroTemas::detallePorIdCurriculaIdClase($idCurriculaCarrera,$idClase);
    ?>
        <div class="subtitulo">
            <h2>Detalle libro de temas</h2>
        </div>

        <div class="conteiner3Columnas">
            <table class="tabla">
                <thead>
                    <tr>
                        <td>Tema del dia</td>
                        <td>Observaciones</td>
                        <td>Acciones</td>
                    </tr>
                </thead>

                <tbody>
                    
                 <?php foreach ($listaDetalleLibro as $detalleLibro):?>
                    <tr>
                        <td><?php echo $detalleLibro->getTemaDia() ?></td>
                        <td><?php echo $detalleLibro->getObservaciones() ?></td>

                        <td>
                            <button class="btn-modificar">
                                <a href="../libroTemas/modificar.php?idCarrera=<?php echo $idCarrera ?>&idMateria=<?php echo $idMateria ?>&id=1&idClase=<?php echo $idClase ?>&idDetalleLibro=<?php echo $detalleLibro->getIdDetalleLibroTemas()?>&idCurriculaCarrera=<?php echo $idCurriculaCarrera?>">Modificar</a>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="formGrupBtnEnviar central" >
            <button type="button" class="formButton" id="Guardar">
                <a href="../../modulos/asistencia/insert.php?idCurriculaCarrera=<?php echo $idCurriculaCarrera?> &idClase=<?php echo $idClase?>">Ingresar Asistencia </a> 
            </button>
        </div>

    </div>



    <?php endif?>

    <?php require_once "../../footer.php"?> 
</body>
    <script type="text/javascript" src="../../script/validacionFormInsert.js"></script>
</html>