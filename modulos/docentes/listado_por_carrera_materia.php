<?php
require_once "../../class/Docente.php";
require_once "../../class/Persona.php";
require_once "../../class/Materia.php";
require_once "../../class/Carrera.php";
require_once "../../class/Sexo.php";
require_once "../../configs.php";

$idMateria=$_GET["idMateria"];
$idCarrera=$_GET["idCarrera"];
$idCicloLectivo=$_GET["idCicloLectivo"];


$idCicloLectivoCarrera=Carrera::idCicloLectivoCarrera($idCicloLectivo,$idCarrera);

$lista = Docente::listadoPorDocenteMateria($idCicloLectivoCarrera,$idMateria);

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
    <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css">
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista Docentes</title>
</head>




<body class="body-listuser">
    <?php require_once "../../menu.php";?>
    
    <div class="titulo">
        <h1>Lista de Docentes de la Materia: <?php echo $materia ?> <br> 
        Carrera: <?php echo $carrera ?></h1>
    </div>
    
    <div class="conteiner-btn-agregar">
        <button type="button" class="btn-agregar" >
             <a href="asignar_docente?idCarrera=<?php echo $idCarrera?>&idMateria=<?php echo $idMateria?>&idCicloLectivo=<?php echo $idCicloLectivo?>">Asignar Docente</a>
         </button>
    </div>
    
    <div class="conteiner" id=>
        <table class="tabla" method="GET">
            <thead>
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
                    <th> Contacto </th>
                    <th> Acciones</th>
                </tr>
            </thead>
            <tbody>
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
                        <a href="../domicilios/domicilios.php?idPersona=<?php echo $docente->getIdPersona(); ?>"><img class="icon-a" src="../../icon/ver.png" title="Ver" alt="Ver"></a> 
                    </td>
                    <td>
                        <a href="../contactos/contactos.php?idPersona=<?php echo $docente->getIdPersona(); ?>"><img class="icon-a" src="../../icon/ver.png" title="Ver" alt="Ver"></a> 
                    </td>
                    <td>
                        <div class="icon">
                            <a href="dar_baja.php?idDocente=<?php echo $docente->getIdDocente(); ?>&idCarrera=<?php echo $idCarrera; ?>&idMateria=<?php echo $idMateria; ?>&idCicloLectivo=<?php echo $idCicloLectivo; ?>" class=""><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                            <a href="../especialidad/listado_por_docente.php?idDocente=<?php echo $docente->getIdDocente(); ?>"><img class="icon-a" src="../../icon/listado.png" title="Lista de Especialidades" alt="Lista de Especialidades"></a>
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
    </table>

    <?php require_once "../../footer.php"?>                           

</body>
</html>