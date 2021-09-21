<?php
require_once "../../class/Materia.php";
require_once "../../class/Estado.php";
require_once "../../configs.php";
require_once "../../class/Carrera.php";


$idCicloLectivoCarrera=$_GET["id"];
$idAlumno=$_GET["idAlumno"];

$listadoMateria=Materia::listadoMateriasParaMatricularAlumno($idCicloLectivoCarrera);
$matricula=Materia::listadoPorAlumno($idAlumno);

$listadoMatriculasActuales=[];

    foreach ($matricula as $i ){
       
            array_push($listadoMatriculasActuales, $i->getIdMateria()); 
    }

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


    <form action="procesarMatricula.php" method="POST">
        
    <input type="hidden" name="IdAlumno" value="<?php echo $idAlumno?>">
    <input type="hidden" name="IdCicloLectivoCarrera" value="<?php echo $idCicloLectivoCarrera?>">

        <table border="1">
            <tr>
                <td>Matricula</td>
                <td>Nombre Materia</td>
                <td>Tiempo de Desarrollo</td>
                <td>Año de Desarrollo</td>
            </tr>
        <?php foreach ($listadoMateria as list($idMateria,$nombreMateria,$periodoDetalle,$anioDetalle) ): ?> 
                                    
            <tr>
                <label for="">
                <td><input type="checkbox" name="check_lista[]" value="<?php echo $idMateria?>"
                <?php 
                    foreach ($listadoMatriculasActuales as $i ){          
                        if ($i==$idMateria){echo "checked";}
                    }
                ?>>
                </td>
                <td>
                    <?php echo $nombreMateria ?>
                </td>
                <td>
                    <?php echo $periodoDetalle ?>
                </td>
                <td>
                    <?php echo $anioDetalle ?>
                </td>
            </tr>
        <?php endforeach;?>
        </table>
        <br>
        <input type="submit" class="" name="guardar" value="Guardar">
        <input name="Cancelar" type="submit" value="Cancelar">
    </form>
    
</body>
</html>