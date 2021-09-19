<?php
require_once "../../class/Materia.php";
require_once "../../class/Estado.php";
require_once "../../configs.php";
require_once "../../class/Carrera.php";


$idCicloLectivoCarrera=$_GET["id"];

$listadoMateria=Materia::listadoMateriasParaMatricularAlumno($idCicloLectivoCarrera)









?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Matriculacion a Materias</h1>


    <form action="">
        <table border="1">
            <tr>
                <td>Matricula</td>
                <td>Nombre Materia</td>
                <td>Tiempo de Desarrollo</td>
                <td>Año de Desarrollo</td>
            </tr>
        <?php foreach ($listadoMateria as list($idMateria,$nombreMateria) ): ?> 
                                    
            <tr>
                <label for="">
                <td><input type="checkbox" name="check_lista[]" value="<?php echo $idMateria?>"></td>
                <td>
                    <?php echo $nombreMateria ?>
                </td>
                <td>

                </td>
                <td>
                    
                </td>
            </tr>
        <?php endforeach;?>
        </table>
        <br>
        <button>Guardar Cambios</button>
        <button>Cancelar Cambios</button>
    </form>
    
</body>
</html>