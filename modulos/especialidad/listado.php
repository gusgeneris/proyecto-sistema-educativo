<?php
require_once "../../class/Especialidad.php";

$especialidad=new Especialidad();

$lista=$especialidad->listaTodos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista especialidads</title>

</head>


<body class="body-listuser">
    
    <?php require_once "../../menu.php";?>

    <div class="titulo">
        <h1 >Lista de Especialidades </h1>
    </div>

    <div class="conteiner-btn-agregar">
        <button type="button" class="btn-agregar" > 
            <a href="insert.php">Agregar Nuevo Especialidad</a> 
        </button>
    </div>

    <div class="conteiner3Columnas" id=>
        <table class="tabla">
            <thead>
                <tr >
                    <th> ID especialidad</th>
                    <th> Descripcion</th>
                    <th> Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $especialidad ):?> 
                <tr >
                    <td >
                        <?php echo $especialidad->getIdEspecialidad(); ?>
                    </td>

                    <td>
                        <?php echo $especialidad->getDescripcion(); ?>
                    </td>
                    <td>
                        <div class="icon">
                            <a href="dar_baja.php?id=<?php echo $especialidad->getIdEspecialidad(); ?>" class=""><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                            <a href="modificar.php?id=<?php echo $especialidad->getIdEspecialidad(); ?>" class=""><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>

</body>
</html>