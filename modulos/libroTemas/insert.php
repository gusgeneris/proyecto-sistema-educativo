<?php
    require_once "../../class/Clase.php";
    require_once "../../class/LibroTemas.php";

    $idClase=$_GET["idClase"];
    $idMateria=$_GET["idMateria"];

    $idCurriculaCarrera=Clase::obtenerIdCurriculaCarreraPorIdClase($idClase);
    $idLibroTemas=LibroTemas::obtenerIdLibroTemas($idCurriculaCarrera);
    $existencia=LibroTemas::comprobarExistencia($idCurriculaCarrera);

    if ($existencia==0){
        ?> <section>
            <form action='procesar_nuevo_libro.php' method='POST'>
                <input type="hidden" name="idClase" value='<?php echo $idClase?>'>
                <input type="hidden" name="idMateria" value='<?php echo $idMateria?>'>
                <h1>Libro de temas inexistente</h1>
                <button  type='submit' name='idCurriculaCarrera' value='<?php echo $idCurriculaCarrera?>'> Agregar Nuevo Libro de Temas  </button>
            </form>
        </section>
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
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Nuevo Detalle Libro Temas</title>
 
    <title>Libro de temas</title>
</head>

<?php require_once "../../menu.php";?>

<body>

    <div class="container-detalle-libro">
        <div class="titulo">
            <h1>Libro de Temas</h1>
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
                
                <div class="formGrup" id="GrupoTemaDia" >
                    <label for="TemaDia" class="formLabel">Tema del dia</label>
                    <div class="formGrupInput">
                        <textarea id="temaDia"name="temaDia"></textarea>
                    </div>
                    <p class="formularioInputError"> Error en el campo tema del dia</p>
                </div>


                <div class="formGrup" id="GrupoObservaciones" >
                    <label for="Obsersaciones" class="formLabel">Observaciones</label>
                    <div class="formGrupInput">
                        <textarea id="observaciones"name="observaciones"></textarea>
                    </div>
                    <p class="formularioInputError"> Error en el campo Observaciones.</p>
                </div>


                <div class="formGrupBtnEnviar" >
                    <button type="submit" class="formButton" id="Guardar"> Guardar Registro </button>
                </div>
        </form>
    </div>
</body>
</html>