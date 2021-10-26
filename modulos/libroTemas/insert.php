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
    <title>Libro de temas</title>
</head>
<body>
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

    <div>
        <form action="procesar_insert.php" method="POST">
            <fieldset>
                <h1>Libro de Temas</h1>

                <input type="hidden" name="idLibroTemas" value="<?php echo $idLibroTemas?>">
                <input type="hidden" name="idCurriculaCarrera" value="<?php echo $idCurriculaCarrera?>">
                <input type="hidden" name="idClase" value="<?php echo $idClase?>">
                
                <div>
                    <label for="temaDia">Actividad del dia</label>
                    <textarea id="temaDia"name="temaDia"></textarea>
                </div>
                <div>
                    <label for="observaciones">Observacion</label>
                    <textarea id="observaciones"name="observaciones"></textarea>
                </div>
                <div>
                    <button type="submit" id=""> Guardar Registro </button>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>