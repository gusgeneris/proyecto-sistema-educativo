<?php
require_once "../../class/Alumno.php";
require_once "../../class/Persona.php";
require_once "../../class/Sexo.php";
require_once "../../configs.php";


$lista = Alumno::listadoAlumnos();


$mensaje='';
    
if(isset($_GET['mj'])){

    switch($_GET['mj']){

        case ERROR_LONGITUD_NAME_CODE:
            $mensaje=ERROR_LONGITUD_NAME;?>
            <div class="mensaje"><?php echo $mensaje;?></div><?php
            break;
        case ERROR_LONGITUD_LAST_NAME_CODE:
            $mensaje=ERROR_LONGITUD_LAST_NAME;?>
            <div class="mensaje"><?php echo $mensaje;?></div><?php
            break;
        case ERROR_NAME_NO_PERMITE_NUMEROS_CODE:
            $mensaje=ERROR_NAME_NO_PERMITE_NUMEROS;?>
            <div class="mensaje"><?php echo $mensaje;?></div><?php
            break;
        case ERROR_LAST_NAME_NO_PERMITE_NUMEROS_CODE:
            $mensaje=ERROR_LAST_NAME_NO_PERMITE_NUMEROS;?>
            <div class="mensaje"><?php echo $mensaje;?></div><?php
            break;
        case ERROR_LONGITUD_NUMERIC_DNI_CODE:
            $mensaje=ERROR_LONGITUD_NUMERIC_DNI;?>
            <div class="mensaje"><?php echo $mensaje;?></div><?php
            break;
        case ERROR_DATE_INCORRECT_CODE:
            $mensaje=ERROR_DATE_INCORRECT;?>
            <div class="mensaje"><?php echo $mensaje;?></div><?php
            break;
        case ERROR_SEXO_INCORRECT_CODE:
            $mensaje=ERROR_SEXO_INCORRECT;?>
            <div class="mensaje"><?php echo $mensaje;?></div><?php
            break;    
        case CORRECT_INSERT_CODE:
            $mensaje=CORRECT_INSERT_MENSAJE;?>
            <div class="mensajes"><?php echo $mensaje;?></div><?php
            break;        
        case CORRECT_UPDATE_CODE:
            $mensaje=CORRECT_UPDATE_MENSAJE;?>
            <div class="mensajes"><?php echo $mensaje;?></div><?php
            break;
        case ERROR_DNI_NUMBER_CODE:
            $mensaje=ERROR_DNI_NUMBER;?>
            <div class="mensajes"><?php echo $mensaje;?></div><?php
            break;    

    }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
    <link rel="icon" type="image/jpg" href="../../image/logo.png">
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <title>Alumnos</title>
    <script type="text/javascript" src="../../script/validacion.js"></script>
</head>

<?php require_once "../../menu.php";?>

<body class="body-listuser">

    <div class="titulo">
        <h1 class="titulo">Lista de Alumnos</h1>
    </div>

    <div class="conteiner-btn-agregar">
        <button type="button" class="btn-agregar" > 
            <a href="insert.php">Agregar Nuevo Alumno</a> 
        </button>
    </div>
    
    <div class="conteiner" >
        <table class="tabla" id="table">
            <thead>
                <tr >
                    <th> ID Alumno</th>
                    <th> ID Persona</th>
                    <th> Nombre</th>
                    <th> Apellido</th>
                    <th> Fecha Nacimiento</th>
                    <th> Nacionalidad</th>
                    <th> Numero Legajo</th>
                    <th> Sexo</th>
                    <th> Contacto</th>
                    <th> Domicilio</th>

                    <th>   Acciones  </th>
                </tr>
            </thead>
            <tbody>
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
                    </td>
                    <td>
                        <div class="icon">
                            <a href="../contactos/contactos.php?idPersona=<?php echo $alumno->getIdPersona(); ?>"><img class="icon-a" src="../../icon/ver.png" title="Ver" alt="Ver"></a>
                        </div>
                    </td>
                    <td>
                        <div class="icon">
                            <a href="../domicilios/domicilios.php?idPersona=<?php echo $alumno->getIdPersona(); ?>"><img class="icon-a" src="../../icon/ver.png" title="Ver" alt="Ver"></a>
                        </div> 
                    </td>
                        <td>
                            <div class="icon">
                                <a href="dar_baja.php?id=<?php echo $alumno->getIdPersona();?>" ><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                            
                                <a href="modificar.php?id=<?php echo $alumno->getIdAlumno();?>" ><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                            
                                <a href="asignarCarrera.php?idAlumno=<?php echo $alumno->getIdAlumno();?>" ><img class="icon-a" src="../../icon/asignar.png" title="Asignar" alt="Asignar Carrera"></a>
                            </div>
                        </td>
                    </tr>               
                <?php endforeach ?>   
            </tbody>
        </table>
    </div>

</body>
</html>