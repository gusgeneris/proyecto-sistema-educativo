<?php
require_once "../../class/Materia.php";
require_once "../../class/Estado.php";

require_once "../../class/Alumno.php";
require_once "../../configs.php";
require_once "../../class/Carrera.php"; 
require_once "../../mensaje.php";


$idCicloLectivo=$_GET["idCiclo"];
$idCarrera=$_GET["idCarrera"];
$carrera=Carrera::listadoPorId($idCarrera);
$idCicloLectivoCarrera=Carrera::idCicloLectivoCarrera($idCicloLectivo,$idCarrera);


$listaAlumnos=Alumno::listadoAlumnos();

$listadoAlumnosAsignados=Alumno::listadoAlumnosAsignados($idCicloLectivoCarrera);

$listadoAlumnosAsiganadosActuales=[];

    foreach ($listadoAlumnosAsignados as $i ){
       
            array_push($listadoAlumnosAsiganadosActuales, $i->getIdAlumno()); 
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" >
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <title>Document</title>
</head>
<body>
    <?php require_once "../../menu.php";?>
    <h1>Asignar Alumno a la Carrera: <?php echo $carrera->getNombre()?></h1>


    <form action="procesar_asignar_alumno.php" method="POST" class="formInsert" id="formInsert" name="formInsert">
        
    <input type="hidden" name="IdCicloLectivoCarrera" value="<?php echo $idCicloLectivoCarrera?>">
    <input type="hidden" name="IdCicloLectivo" value="<?php echo $idCarrera?>">
    <input type="hidden" name="IdCarrera" value="<?php echo $idCicloLectivo?>">

    <div class="conteiner">
        <table class="tabla">
            <tr>
                <td>Asignar</td>
                <td>Nombre Alumno</td>
                <td>Nombre Apellido</td>
                <td>Numero DNI</td>
                <td>Nacionalidad</td>
            </tr>
        <?php foreach ($listaAlumnos as $alumno) : ?> 
                                    
            <tr>
                <label for="">
                <td><input type="checkbox" name="check_lista[]" value="<?php echo $alumno->getIdAlumno();?>"
                <?php 
                    foreach ($listadoAlumnosAsiganadosActuales as $idAlumno ){          
                        if ($idAlumno==$alumno->getIdAlumno()){echo "checked";}
                    }
                ?>>
                </td>
                <td>
                    <?php echo $alumno->getNombre() ?>
                </td>
                <td>
                    <?php echo $alumno->getApellido() ?>
                </td>
                <td>
                    <?php echo $alumno->getDni() ?>
                </td>
                <td>
                    <?php echo $alumno->getNacionalidad() ?>
                </td>
            </tr>
        <?php endforeach;?>
        </table>
        <br>
        <input type="submit" class="" name="guardar" value="Guardar">
        <input name="Cancelar" type="submit" value="Cancelar">
        </div>
    
        <?php require_once "../../footer.php"?>   
    
</body>
</html>