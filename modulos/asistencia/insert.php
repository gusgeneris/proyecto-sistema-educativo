<?php
    require_once "../../class/Alumno.php";
    require_once "../../class/CicloLectivo.php"; 
    require_once "../../class/DetalleLibroTemas.php";    
    require_once "../../class/Materia.php";   
    require_once "../../class/Clase.php";
    require_once "../../mensaje.php";


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
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png">
    <title>Nueva Asitencia</title>
</head>

<?php require_once "../../menu.php";?>

<body>
    <div class="titulo">
        <h1>Asistencia</h1>
    </div>
    <div class="conteiner-descripcion-clase">
        <div class="subtitulo">
            <h2>Clase Asociada</h2>
        </div>

        <div class="conteiner-h3">
            <h3>
                 Numero Clase: <span><?php echo $clase->getNumeroClase() ?></span>
            </h3>
        </div>
        <div class="conteiner-btn-modificar">
            <button class="btn-modificar">
                <a href="../clase/modificar.php?id=3&idClase=<?php echo $idClase ?>&idMateria=<?php echo $idMateria?>&idCurriculaCarrera=<?php echo $idCurriculaCarrera?>">Modificar</a>
            </button>
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
    <div class="conteiner-descripcion-clase">

        <div class="subtitulo">
            <h2>Detalle libro de temas Asociado</h2>
        </div>

        <div class="conteiner-h3">
            <h3>
                Tema del dia:<span> <?php echo $detalleLibro->getTemaDia() ?></span>
            </h3>
        </div>
        
        <div class="conteiner-h3">
            <h3>
                Observaciones:<span> <?php echo $detalleLibro->getObservaciones() ?></span>
           </h3>
        </div>

        <div class="conteiner-btn-modificar">
            <button class="btn-modificar">
                <a href="../libroTemas/modificar.php?id=1&idClase=<?php echo $idClase ?>&idDetalleLibro=<?php echo $detalleLibro->getIdDetalleLibroTemas()?>&idCurriculaCarrera=<?php echo $idCurriculaCarrera?>">Modificar</a>
            </button>
        </div>
        <div class="conteiner-h3">
            <h3>
               Firma observante: 
           </h3>
        </div>
    </div>


    <form action="procesar_insert.php" method="POST">

    <input type="hidden" name="idClase" value="<?php echo $idClase ?>">
    <input type="hidden" name="idMateria" value="<?php echo $idMateria ?>">
    <input type="hidden" name="idCicloLectivoCarrera" value="<?php echo $idCicloLectivoCarrera ?>">
    <input type="hidden" name="idCurriculaCarrera" value="<?php echo $idCurriculaCarrera ?>">
    
    <div class="subtitulo">
        <h2 class="">Lista de Alumnos</h2>
    </div>

    <div class="conteinerAsistencia" id=>
        <table class="tabla" id="table">

        <thead>
            <tr>
                <th>Asistencia</th>
                <th>id Alumno</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Dni</th>
            </tr>
        </thead>

            <?php foreach ($listado as $alumno):?>
                <tbody>
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
                    </tr>
                </tbody>
            <?php endforeach?>
        </table>
        <div class="formGrupBtnEnviar" >
            <button type="submit"  class="formButton" id="Guardar"> Guardar Registro </button>
        </div>
        </form>
    </div>
    <?php require_once "footer.php"?>               
</body>
</html>