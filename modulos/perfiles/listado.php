<?php
require_once "../../class/Perfil.php";
require_once "../../configs.php";

$perfil=new Perfil();
$listaPerfiles=$perfil->perfilTodos();

/*highlight_string(var_export($listaPerfiles,true));
$idCicloLectivo=false;
if (isset($_GET["idCiclo"])){
    $idCicloLectivo=$_GET["idCiclo"];
    $listaPerfiles=$perfil->listaPerfilesPorCicloLectivo($idCicloLectivo);
}else{
    
}*/

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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Listado perfiles</title>
    <title>Document</title>
</head>
<body class="body-listuser">


    <?php require_once "../../menu.php";?>
    <br>
    <br>
    <h1 class="titulo">Lista de Perfiles</h1>
    <br>
    <br>
    <div><a href="insert.php">Agregar perfil</a>
    <br>
    <br>
    <table class="tabla">
    <th>Id Perfil</th>
    <th>Nombre</th>
    <th>Estado</th>
    <th>Acciones</th>
    <tr>
        <?php foreach ($listaPerfiles as $perfil):?>
        <tr>
            <td>
                <?php echo $perfil->getIdPerfil()?>
            </td>
            <td>
                <?php echo $perfil->getPerfilNombre()?> 
            </td>
            <td>
                1
            </td>
            <td>
                <a href="modificar.php?id=<?php echo $perfil->getIdPerfil()?>">modificar</a> | <a href="dar_baja.php?id=<?php echo $perfil->getIdPerfil()?>">borrar</a> |  <a href="../../modulos/modulos/listado?idPerfil=<?php echo $perfil->getIdPerfil()?>">Listado de Modulos designados</a>
            </td>
            <?php endforeach?>
        </tr>
    </tr>


    
    </table>

</body>
</html>