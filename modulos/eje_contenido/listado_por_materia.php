<?php
    require_once "../../class/EjeContenido.php";
    require_once "../../class/Materia.php";
    require_once "../../class/CicloLectivo.php";
    require_once "../../class/Carrera.php";
    require_once "../../class/Docente.php";
    require_once "../../mensaje.php";

    $eje=new EjeContenido();

    $idMateria=$_GET['idMateria'];
    $idCarrera=$_GET['idCarrera'];
    $idCicloLectivo=$_GET["idCicloLectivo"];
    
    
    
    $lista=EjeContenido::obtenerPorIdMateria($idMateria,$idCarrera);
    
    $materia=Materia::listadoPorId($idMateria);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
        <link rel="stylesheet" href="../../style/menuVertical.css">
        <script src="../../jquery3.6.js"></script>
        <script type="text/javascript" src="../../script/menu.js" defer> </script>
        <script src ="../../script/comboCarrera.js"></script>
        <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css" class="">
        <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista ejes</title>

    </head>
    
    <body class="body-listuser">
        <?php require_once "../../menu.php";?>

        <div class="titulo">
            <h1>Lista de Eje Contenido de la Materia:  <?php echo $materia?></h1>
        </div>

        <div class="conteiner3Columnas">
            <table class="tabla" method="GET">
                <thead >
                    <tr>
                        <th> ID Eje</th>
                        <th> Numero de Eje</th>
                        <th> Descripcion</th>
                        <th> Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($lista as $contenido ):?> 
                        <tr >
                            <td >
                                <?php echo $contenido->getIdEjeContenido(); ?>
                            </td>
                            <td>
                                <?php echo $contenido->getNumero(); ?>                
                            </td>
                            <td>
                                <?php echo $contenido->getDescripcion(); ?>
                            </td>
                            <td>
                                <a href="dar_baja.php?id=<?php echo $contenido->getIdEjeContenido(); ?>&idMateria=<?php echo $idMateria?>&idCarrera=<?php echo $idCarrera?>" class=""><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                                <a href="modificar.php?id=<?php echo $contenido->getIdEjeContenido(); ?>&idMateria=<?php echo $idMateria?>&idCarrera=<?php echo $idCarrera?>" class=""><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>   
    <?php require_once "../../footer.php"?>         
    </body>

</html>