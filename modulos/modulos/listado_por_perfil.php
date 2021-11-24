<?php
require_once "../../class/Modulo.php";
require_once "../../configs.php";

$idPerfilDelModulo=$_GET["idPerfil"];
$modulo=new Modulo();
$listaModulos=$modulo->obtenerPorIdPerfil($idPerfilDelModulo);

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
    <link rel="stylesheet" href="../../style/mensaje.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Listado Modulos</title>
    <title>Document</title>
</head>
<body class="body-listuser">


    <?php require_once "../../menu.php";
    require_once "../../mensaje.php";?>
    
    <div class="titulo">
        <h1>Lista de Modulos</h1>
    </div>
    
    <div class="conteiner-btn-agregar">
        <button type="button" class="btn-agregar" > 
            <a href="asignar_modulo.php?idPerfil=<?php echo $idPerfilDelModulo?>">Asignar Nuevo Modulo</a> 
        </button>
    </div>

    <div class="conteiner3Columnas" >
        <table class="tabla" id="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                    <?php foreach ($listaModulos as $modulo):?>
                    <tr>
                        <td>
                            <?php echo $modulo->getNombre()?> 
                        </td>
                        <td>
                            <div class="icon">
                                <a href="#" onclick="consulta(<?php echo $modulo->getIdModulo();?>,<?php echo $idPerfilDelModulo?>)"><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach?>
            </tbody>
        </table>
    </div>
        
    <?php require_once "../../footer.php"?> 
</body>

    <script>
        function consulta(idModulo,idPerfil){

            if (confirm("¿Estas deguro que deseas eliminar?"))
            {
                window.location.href="dar_baja.php?id="+idModulo+"&idPerfil="+idPerfil;
            }
        }
    </script>
</html>