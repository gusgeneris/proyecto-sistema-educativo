<?php
require_once "../../class/Modulo.php";
require_once "../../configs.php";

$idPerfilDelModulo=$_GET["idPerfil"];
$modulo=new Modulo();
$listaModulos=$modulo->obtenerPorIdPerfil($idPerfilDelModulo);

/*highlight_string(var_export($listaModuloes,true));
$idCicloLectivo=false;
if (isset($_GET["idCiclo"])){
    $idCicloLectivo=$_GET["idCiclo"];
    $listaModuloes=$Modulo->listaModuloesPorCicloLectivo($idCicloLectivo);
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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Listado Modulos</title>
    <title>Document</title>
</head>
<body class="body-listuser">


    <?php require_once "../../menu.php";?>
    <br>
    <br>
    <h1 class="titulo">Lista de Modulos</h1>
    <br>
    <br>
    
    <div><a href="insert.php?idPerfil=<?php echo $idPerfilDelModulo?>">Asignar Modulo a este Perfil</a>
    <br>
    <br>
    <table class="tabla">
    <th>Id Modulo</th>
    <th>Nombre</th>
    <th>Acciones</th>
    <tr>
        <?php foreach ($listaModulos as $modulo):?>
        <tr>
            <td>
                <?php echo $modulo->getIdModulo()?>
            </td>
            <td>
                <?php echo $modulo->getNombre()?> 
            </td>
            <td>
                 <a href="dar_baja.php?id=<?php echo $modulo->getIdModulo()?>&idPerfil=<?php echo $idPerfilDelModulo?>">borrar</a> 
            </td>
            <?php endforeach?>
        </tr>
    </tr>


    
    </table>

</body>
</html>