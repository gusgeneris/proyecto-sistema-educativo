<?php
require_once "../../class/Alumno.php";
require_once "../../class/Persona.php";
require_once "../../class/Sexo.php";
require_once "../../configs.php";


$lista = Alumno::listadoAlumnos();


$mensaje='';
    
if(isset($_GET['mj'])){
    $mj=$_GET['mj'];
    if ($mj==CORRECT_INSERT_CODE){
        $mensaje=CORRECT_INSERT_MENSAJE;?>
        <div class="mensajes"><?php echo $mensaje;?></div><?php
    }else if($mj==CORRECT_UPDATE_CODE){
        $mensaje=CORRECT_UPDATE_MENSAJE;?>
        <div class="mensajes"><?php echo $mensaje;?></div><?php
    }
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css" class="">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar Alumno</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body-listuser">
    <br>
    <br>
    <h1 class="titulo">Lista de Alumnos</h1>
    <br>
    <br>
 
    <table class="tabla" method="GET">
        <tr >
            <th> ID Alumno</th>
            <th> ID Persona</th>
            <th> Nombre</th>
            <th> Apellido</th>
            <th> Fecha Nacimiento</th>
            <th> Nacionalidad</th>
            <th> Numero Legajo</th>
            <th> Sexo</th>

            <th> Acciones</th>

        </tr>
        <?php foreach ($lista as $alumno ):?> 
            <tr >
                <td >
                    <?php echo $alumno->getIdAlumno(); ?>
                </td>
                <td>
                    <?php echo $alumno->getIdPersona(); ?>
                </td>
                <td>
                    <?php echo $alumno->getNombre(); ?>
                </td>
                <td>
                    <?php echo $alumno->getApellido(); ?>
                </td>
                <td>
                    <?php echo $alumno->getFechaNacimiento(); ?>
                </td>
                <td>
                    <?php echo $alumno->getNacionalidad(); ?>
                </td>
                <td>
                    <?php echo $alumno->getNumLegajo(); ?>
                </td>
                <td>
                    <?php
                        $listadoSexo= Sexo::sexoTodoPorId($alumno->getIdSexo());
                        foreach($listadoSexo as $sexo):
                            echo $sexo->getDescripcion(); 
                        endforeach
                    ?>
                    <?php # echo $alumno->getIdSexo(); ?>
               </td>
                <td>
                    <a href="dar_baja.php?id= <?php echo $alumno->getIdPersona(); ?>" class="">Borrar</a>
                    <a href="modificar.php?id= <?php echo $alumno->getIdAlumno(); ?>" class="">Modificar</a>
                </td>

            </tr>
        <?php endforeach ?>    
    </table>
</body>
</html>