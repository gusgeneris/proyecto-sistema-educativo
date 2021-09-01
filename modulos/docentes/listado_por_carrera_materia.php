<?php
require_once "../../class/Docente.php";
require_once "../../class/Persona.php";
require_once "../../class/Materia.php";
require_once "../../class/Carrera.php";
require_once "../../class/Sexo.php";
require_once "../../configs.php";

$idMateria=$_GET["idMateria"];
$idCarrera=$_GET["idCarrera"];

$lista = Docente::listadoPorDocenteMateria($idCarrera,$idMateria);
$materia=Materia::listadoPorId($idMateria);
$carrera=Carrera::listadoPorId($idCarrera);


#highlight_string(var_export($lista,true));

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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista Docentes</title>
</head>


<?php require_once "../../menu.php";?>

<body class="body-listuser">
    <br>
    <br>
    <h1 class="titulo">Lista de Docentes de la Materia: <?php echo $materia ?> / <br><?php echo $carrera ?></h1>
    <br>
    <br>
    <a href="asignar_docente?idCarrera=<?php echo $idCarrera?>&idMateria=<?php echo $idMateria?>">Asignar Docente</a>
    <table class="tabla" method="GET">
        <tr >
            <th> ID Docente</th>
            <th> ID Persona</th>
            <th> Nombre</th>
            <th> Apellido</th>
            <th> Fecha Nacimiento</th>
            <th> Nacionalidad</th>
            <th> Numero Matricula</th>
            <th> Sexo</th>
            <th> Direccion </th>

            <th> Acciones</th>

        </tr>
        <?php foreach ($lista as $docente ):?> 
            <tr >
                <td >
                    <?php echo $docente->getIdDocente(); ?>
                </td>
                <td>
                    <?php echo $docente->getIdPersona(); ?>
                </td>
                <td>
                    <?php echo $docente->getNombre(); ?>
                </td>
                <td>
                    <?php echo $docente->getApellido(); ?>
                </td>
                <td>
                    <?php echo $docente->getFechaNacimiento(); ?>
                </td>
                <td>
                    <?php echo $docente->getNacionalidad(); ?>
                </td>
                <td>
                    <?php echo $docente->getNumMatricula(); ?>
                </td>
                <td>
                    <?php
                        $listadoSexo= Sexo::sexoTodoPorId($docente->getIdSexo());
                        foreach($listadoSexo as $sexo):
                            echo $sexo->getDescripcion(); 
                        endforeach
                        #echo $docente->getIdSexo();
                    ?>
                </td>
                <td>
                    <a href="../domicilios/domicilios.php?idPersona=<?php echo $docente->getIdPersona(); ?>">Ver</a> 
                </td>
                <td>
                    <a href="dar_baja.php?idDocente=<?php echo $docente->getIdDocente(); ?>&idCarrera=<?php echo $idCarrera; ?>&idMateria=<?php echo $idMateria; ?>" class="">Eliminar</a> |
                    <a href="../especialidad/listado_por_docente.php?idDocente=<?php echo $docente->getIdDocente(); ?>" class="">Lista de Especialidades</a>
                </td>
            </tr>
        <?php endforeach ?>
    
    </table>



</body>
</html>