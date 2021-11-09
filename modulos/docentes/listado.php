<?php
require_once "../../class/Docente.php";
require_once "../../class/Persona.php";
require_once "../../class/Sexo.php";
require_once "../../configs.php";
require_once "../../mensaje.php";

$lista = Docente::listadoDocente();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista Docentes</title>
</head>


<?php require_once "../../menu.php";?>

<body class="body-listuser">

    <div class="titulo">
        <h1 class="titulo">Lista de Docentes</h1>
    </div>

    <div class="conteiner-btn-agregar">
        <button type="button" class="btn-agregar" > 
            <a href="insert.php">Agregar Nuevo Docente</a> 
        </button>
    </div>

    <div class="conteiner" id=>
        <table class="tabla" >
            <thead>
                <tr>
                    <th> ID Docente</th>
                    <th> ID Persona</th>
                    <th> Nombre</th>
                    <th> Apellido</th>
                    <th> Fecha Nacimiento</th>
                    <th> Nacionalidad</th>
                    <th> Numero Matricula</th>
                    <th> Sexo</th>
                    <th>Contacto</th>
                    <th>Domicilios</th>
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
                        ?>
                    </td>
                    <td>
                        <a href="../contactos/contactos.php?idPersona=<?php echo $docente->getIdPersona(); ?>"><img class="icon-a" src="../../icon/ver.png" title="Ver" alt="Ver"></a> 
                    </td>
                    <td>
                        <a href="../domicilios/domicilios.php?idPersona=<?php echo $docente->getIdPersona(); ?>"><img class="icon-a" src="../../icon/ver.png" title="Ver" alt="Ver"></a> 
                    </td>
                    <td>
                        <div class="icon">
                            <a href="dar_baja.php?id=<?php echo $docente->getIdPersona(); ?>" class=""><i class="icono eliminar fas fa-trash" title="Eliminar" alt="Eliminar"></i></a>
                            <a href="modificar.php?id= <?php echo $docente->getIdDocente(); ?>" class=""><i class="icono modificar fas fa-edit"  title="Modificar" alt="Modificar"></i></a>
                            <a href="../especialidad/listado_por_docente.php?idDocente=<?php echo $docente->getIdDocente(); ?>" class=""><i class="icono modificar fas fa-clipboard-list" title="Lista de Especialidades" alt="Lista de Especialidades"></i></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>                    
        </table>
    </div>
    <?php require_once "../../footer.php"?>                               

</body>
</html>