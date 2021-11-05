<?php
require_once "../../class/Perfil.php";
require_once "../../configs.php";

$perfil=new Perfil();
$listaPerfiles=$perfil->perfilTodos();
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
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Listado perfiles</title>
    <title>Listado de Perfiles</title>
</head>
<body class="body-listuser">


    <?php require_once "../../menu.php";?>
    
    <div class="titulo">
        <h1 class="titulo">Lista de Perfiles</h1>
    </div>

    <div class="conteiner-btn-agregar">
        <button type="button" class="btn-agregar" > <a href="insert.php">Agregar Nuevo Perfil</a> </button>
    </div>


    <div class="conteiner3Columnas" id=>
        <table class="tabla">
            <thead>
                <th>Id Perfil</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Acciones</th>
            </thead>
            <tbody>
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
                        <div class="icon">
                            <a href="modificar.php?id=<?php echo $perfil->getIdPerfil()?>"><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                            <a href="dar_baja.php?id=<?php echo $perfil->getIdPerfil()?>"><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                            <a href="../../modulos/modulos/listado_por_perfil?idPerfil=<?php echo $perfil->getIdPerfil()?>"><img class="icon-a" src="../../icon/listado.png" title="Lista de modulos asignados" alt="Lista de modulos asignados"></a>
                        </div>
                    </td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>

</body>
</html>