<?php
require_once "../../class/AnioDesarrollo.php";    
require_once "../../mensaje.php";

$lista=AnioDesarrollo::listaTodos();

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
        <link rel="stylesheet" href="../../style/menuVertical.css">
        <link rel="stylesheet" href="../../style/tabla.css">
        <script src="../../jquery3.6.js"></script>
        <script type="text/javascript" src="../../script/menu.js" defer> </script>
        <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista cicloLectivos</title>

    </head>
    <?php require_once "../../menu.php";?>
    <body class="body-listuser">

        <div class="titulo">
            <h1 class="titulo">Lista de Años de Desarrollo para Materias</h1>
        </div>

        <div class="conteiner3Columnas">

            <table class="tabla">
                <thead>
                    <tr >
                        <th> ID Anio Desarrollo</th>
                        <th> Año Desarrollo</th>
                        <th> Acciones</th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach ($lista as $anioDesarrollo ):?> 
                    <tr >
                        <td >
                            <?php echo $anioDesarrollo->getIdAnioDesarrollo(); ?>
                        </td>
                        <td>
                            <?php echo $anioDesarrollo->getDetalleAnio(); ?>
                        </td>
                        <td>
                            <div class="icon">
                                
                                <a href="modificar.php?id=<?php  echo $anioDesarrollo->getIdAnioDesarrollo()?>"><i class="icono modificar fas fa-edit"  title="Modificar" alt="Modificar"></i></a>
                                
                                <a href="dar_baja.php?id=<?php echo $anioDesarrollo->getIdAnioDesarrollo();?>"><i class="icono eliminar fas fa-minus-circle" title="Dar Baja" alt="Dar Baja"></i></a>
                            
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