<?php
require_once "../../class/Materia.php";
require_once "../../class/Estado.php";
require_once "../../class/Alumno.php";
require_once "../../configs.php";
require_once "../../class/Carrera.php";


$idCicloLectivoCarrera=$_GET["id"];
$idAlumno=$_GET["idAlumno"];    

$listadoMateria=Materia::listadoMateriasParaMatricularAlumno($idCicloLectivoCarrera);
$matricula=Materia::listadoPorAlumno($idCicloLectivoCarrera,$idAlumno);

$alumno=Alumno::obtenerTodoPorId($idAlumno);
$nombreCarrera=Carrera::carreraPorIdCicloLectivoCarrera($idCicloLectivoCarrera);


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
        <link rel="stylesheet" href="/proyecto-modulos/style/styleFormInsert.css">
        <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css" >
        <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
        <link rel="stylesheet" href="../../style/menuVertical.css">
        <script type="text/javascript" src="../../script/menu.js" defer> </script>
        <script src ="../../jquery3.6.js"></script>
        <script src ="../../script/comboAsignarCarrera.js"></script>
        <link rel="icon" type="image/jpg" href="../../image/logo.png">
        <title>Matricular Alumno a materia</title>
    </head>
    <body>
        <?php require_once "../../menu.php";?>

        <div class="titulo">
            <h1>Matriculacion a Materias del Alumno: <span> <?php echo $alumno?> </span><br> Carrera: <span><?php echo $nombreCarrera ?></span><h1>
        </div>

        <div class="main">
            <form action="procesarMatricula.php" method="POST" class="formInsert" id="formInsert" name="formInsert">
                
            <input type="hidden" name="IdAlumno" value="<?php echo $idAlumno?>">
            <input type="hidden" name="IdCicloLectivoCarrera" value="<?php echo $idCicloLectivoCarrera?>">
            
            <div class="conteiner">
                <table class="tabla">
                    <thead>
                        <tr>
                            <td>Matricula</td>
                            <td>Nombre Materia</td>
                            <td>Tiempo de Desarrollo</td>
                            <td>Año de Desarrollo</td>
                        </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($listadoMateria as list($idMateria,$nombreMateria,$periodoDetalle,$anioDetalle) ): ?> 
                                            
                    <tr>
                        
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
                    </tbody>
                </table>
            </div>
                
                <div class="formGrupBtnEnviar">
                    <button type="submit" class="formButton" value ="FormInsertAsignarCarrera" id="Guardar"> Guardar</button>
                    <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false">Cancelar</button>
                </div>

            </form>
        </div>

        
        <?php require_once "../../footer.php"?>
        
    </body>
</html>