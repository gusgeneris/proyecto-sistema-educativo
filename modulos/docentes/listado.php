<?php
require_once "../../class/Docente.php";
require_once "../../class/Persona.php";
require_once "../../class/Sexo.php";
require_once "../../class/Estado.php";
require_once "../../configs.php";

if(isset($_GET["cboFiltroEstado"])){
    $filtroEstado=$_GET["cboFiltroEstado"];
} else{
    $filtroEstado=1;
}

if(isset($_GET["txtNombre"])){
    $filtroApellido=$_GET["txtNombre"];
} else{
    $filtroApellido="";
}

$lista = Docente::listadoDocente($filtroEstado,$filtroApellido);

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
        <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
        <link rel="stylesheet" href="../../style/menuVertical.css">
        <link rel="stylesheet" href="../../style/mensaje.css">
        <script src="../../jquery3.6.js"></script>
        <script type="text/javascript" src="../../script/estadosListado.js"></script>
        <script type="text/javascript" src="../../script/menu.js" defer> </script>
        <link rel="icon" type="image/jpg" href="../../image/logo.png">
        <title>Lista Docentes</title>
    </head>


    

    <body>
        <?php
            require_once "../../mensaje.php";
            require_once "../../menu.php";
        ?>

        <div class="titulo">
            <h1 class="titulo">Lista de Docentes</h1>
        </div>

        <div class="conteiner-btn-agregar">
            <button type="button" class="btn-agregar" > 
                <a href="insert.php">Agregar Nuevo Docente</a> 
            </button>
        </div>

        
        <div class="conteiner-form-busqueda">
            <form >
                <div class="conteiner-form">
                    <div>
                        <label class="label" for="selectEstado"> Estado: </label>
                            <select name="cboFiltroEstado" id="selectEstado" method="GET" class="cboSelect">
                                <?php $listadoEstados= Estado::estadoTodos();
                                    foreach($listadoEstados as $estado):?>
                                <option value="<?php echo $estado->getIdEstado(); ?>" name=""><?php echo $estado->getDescripcion() ; ?></option>  
                                <?php endforeach ?>
                                <option value="0" class="">Todos</option>
                            </select>
                    </div>
                
                    <div>
                        <label class="label" for="nombreCarrera"> Nombre Carrera: </label>
                            <input class="form-input" type="text" name="txtNombre" id="nombreCarrera">
                    </div>
                    <div class="conteiner-btn-filtrar">
                        <button class="btn-filtrar" type="submit" value="Filtrar"> Filtrar </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="conteiner" >
            <table class="tabla" id="table" >
                <thead>
                    <tr>
                        <th> Estado</th>
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
                        <td>
                            <?php $estado=Estado::estadoPorId($docente->getEstado());
                                    echo $estado->getDescripcion() ?>
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
                                <a href="dar_baja.php?id=<?php echo $docente->getIdPersona(); ?>" class=""><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                                <a href="modificar.php?id= <?php echo $docente->getIdDocente(); ?>" class=""><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                                <a href="../especialidad/listado_por_docente.php?idDocente=<?php echo $docente->getIdDocente(); ?>" class=""><img class="icon-a" src="../../icon/listado.png" title="Lista Especialidades" alt="Lista Especialidades"></a>
                                <?php if (($docente->getEstado())==2){?>
                                        <a href="dar_alta.php?id=<?php echo $docente->getIdPersona()?>"><img class="icon-a" src="../../icon/alta.png" title="Dar Alta" alt="Dar Alta"></a>
                                <?php } ?>
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