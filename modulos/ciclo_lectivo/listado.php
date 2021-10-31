<?php
require_once "../../class/CicloLectivo.php";

$lista=CicloLectivo::listaTodos();

#highlight_string(var_export($lista,true));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista cicloLectivos</title>

</head>
<?php require_once "../../menu.php";?>

<body class="body-listuser">
    
    <div class="titulo">
        <h1 class="titulo">Lista de Ciclos Lectivos</h1>
    </div>   
    <div class="conteiner-btn-agregar">
        <button type="button" class="btn-agregar" > <a href="insert.php"> Agregar Nuevo Ciclo </a> </button>
    </div>
    <div class="conteiner3Columnas">
        <table class="tabla" method="GET">
            <thead>
                <tr >
                    <th> ID Ciclo Lectivo</th>
                    <th> Año</th>
                    <th> Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $cicloLectivo ):?> 
                    <tr >
                        <td >
                            <?php echo $cicloLectivo->getIdCicloLectivo(); ?>
                        </td>
                        <td>
                            <?php echo $cicloLectivo->getAnio(); ?>
                        </td>
                        <td>
                            <div class="icon">
                                <a href="dar_baja.php?id=<?php echo $cicloLectivo->getIdCicloLectivo(); ?>" class=""><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a> 
                                
                                <a href="modificar.php?id=<?php echo $cicloLectivo->getIdCicloLectivo(); ?>" class=""><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                                
                                <a href="../carreras/listado_por_ciclo.php?idCiclo=<?php echo $cicloLectivo->getIdCicloLectivo(); ?>" class=""><img class="icon-a" src="../../icon/listado.png" title="Lista Carreras Asociadas" alt="Lista Carreras Asociadas"></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>       
</body>

</html>