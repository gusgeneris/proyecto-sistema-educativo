
<?php
require_once "../../class/Usuario.php";
require_once "../../class/Perfil.php";
require_once "../../class/Usuario.php";
require_once "../../class/Estado.php";
require_once "../../configs.php";
require_once "../../mensaje.php";

if(isset($_GET["cboFiltroEstado"])){
    $filtroEstado=$_GET["cboFiltroEstado"];
} else{
    $filtroEstado=1;
}

if(isset($_GET["txtApellido"])){
    $filtroApellido=$_GET["txtApellido"];
} else{
    $filtroApellido="";
}

$lista = Usuario::obtenerTodos($filtroEstado,$filtroApellido);

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
        <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista Usuarios</title>

    </head>
    <?php require_once "../../menu.php";?>
    <body class="body-listuser">
        
        <div class="titulo">
            <h1>Lista de Usuarios</h1>
        </div>

        <div class="conteiner-btn-agregar">
            <button type="button" class="btn-agregar" > <a href="insert.php">Agregar Nuevo Usuario</a> </button>
        </div>

        <div class="conteiner-form-busqueda">
            <form>
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
                            <label class="label" for="txtApellido"> Apellido: </label>
                            <input class="form-input" type="text" name="txtApellido">
                        </div>
                        <div class="conteiner-btn-filtrar">
                            <button class="btn-filtrar" type="submit" value="Filtrar"> Filtrar </button>
                        </div>
                </div>
            </form>
        </div>

        <div class="conteiner" id=>
            <table class="tabla">
                <thead>
                    <tr >
                        <th> ID Usuario</th>
                        <th> ID Persona</th>
                        <th> Nombre</th>
                        <th> Apellido</th>
                        <th> Fecha Nacimiento</th>
                        <th> Nombre Usuario</th>
                        <th> Sexo</th>
                        <th> Perfil</th>
                        <th>Contacto</th>
                        <th>Direccion</th>
                        <th> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista as $usuario ):?> 
                        <tr >
                            <td >
                                <?php echo $usuario->getIdUsuario(); ?>
                            </td>
                            <td>
                                <?php echo $usuario->getIdPersona(); ?>
                            </td>
                            <td>
                                <?php echo $usuario->getNombre(); ?>
                            </td>
                            <td>
                                <?php echo $usuario->getApellido(); ?>
                            </td>
                            <td>
                                <?php echo $usuario->getFechaNacimiento(); ?>
                            </td>
                            <td>
                                <?php echo $usuario->getNombreUsuario(); ?>
                            </td>
                            <td>
                                <?php 
                                    $listadoSexo= Sexo::sexoTodoPorId($usuario->getIdSexo());
                                    foreach($listadoSexo as $sexo):
                                        echo $sexo->getDescripcion(); 
                                    endforeach 
                                    #echo $usuario->getIdSexo(); ?>
                            </td>
                            <td>
                                <?php $perfil= Perfil::perfilPorId($usuario->getIdPerfil());
                                    /*foreach($listadoPerfil as $perfil):
                                        echo $perfil->getPerfilNombre(); 
                                    endforeach  */
                                    echo $perfil->getPerfilNombre(); ?>
                            </td>
                            <td>
                                <a href="../contactos/contactos.php?idPersona=<?php echo $usuario->getIdPersona(); ?>"><img class="icon-a" src="../../icon/ver.png" title="Ver" alt="Ver"></a> 
                            </td>
                            <td>
                                <a href="../domicilios/domicilios.php?idPersona=<?php echo $usuario->getIdPersona(); ?>"><img class="icon-a" src="../../icon/ver.png" title="Ver" alt="Ver"></a> 
                            </td>
                            <td>
                                <a href="dar_baja.php?id=<?php echo $usuario->getIdPersona(); ?>" class=""><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                                <a href="modificar.php?id= <?php echo $usuario->getIdUsuario(); ?>" class=""><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <?php require_once "../../footer.php"?> 



    </body>
</html>