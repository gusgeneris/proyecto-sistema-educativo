
<?php
require_once "../../class/Usuario.php";
require_once "../../class/Perfil.php";
require_once "../../class/Usuario.php";
require_once "../../class/Estado.php";
require_once "../../configs.php";

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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista Usuarios</title>

</head>
<?php require_once "../../menu.php";?>
<body class="body-listuser">
    <br>
    <br>
    <h1 class="titulo">Lista de Usuarios</h1>
    <br>
    <br>

    <form >
    &nbsp;&nbsp;&nbsp;&nbsp;
        <label> Estado: </label>
            <select name="cboFiltroEstado" id="" method="GET">
                <?php $listadoEstados= Estado::estadoTodos();
                    foreach($listadoEstados as $estado):?>
                <option value="<?php echo $estado->getIdEstado(); ?>" class=""><?php echo $estado->getDescripcion() ; ?></option>  
                <?php endforeach ?>
                <option value="0" class="">Todos</option>
            </select>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <label> Apellido: </label>
            <input type="text" name="txtApellido">
            <input type="submit" value="Filtrar">
    </form>
    <br><br>
    <table class="tabla" method="GET">
        <tr >
            <th> ID Usuario</th>
            <th> ID Persona</th>
            <th> Nombre</th>
            <th> Apellido</th>
            <th> Fecha Nacimiento</th>
            <th> Nombre Usuario</th>
            <th> Sexo</th>
            <th> Perfil</th>
            <th> Acciones</th>

        </tr>
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
                    <a href="dar_baja.php?id=<?php echo $usuario->getIdPersona(); ?>" class="">borrar</a>
                    <a href="modificar.php?id= <?php echo $usuario->getIdUsuario(); ?>" class="">modificar</a>
                </td>
            </tr>
        <?php endforeach ?>
    
    </table>



</body>
</html>