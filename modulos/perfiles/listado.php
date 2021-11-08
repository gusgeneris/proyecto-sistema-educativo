<?php
require_once "../../class/Perfil.php";
require_once "../../configs.php";
require_once "../../mensaje.php";

$perfil=new Perfil();
$listaPerfiles=$perfil->perfilTodos();
$mensaje='';
    


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
    <?php require_once "../../footer.php"?> 

</body>
</html>