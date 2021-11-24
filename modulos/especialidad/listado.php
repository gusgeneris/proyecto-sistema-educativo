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
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <link rel="stylesheet" href="../../style/mensaje.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista especialidads</title>

</head>


<body class="body-listuser">
    
    <?php require_once "../../menu.php";
require_once "../../mensaje.php";?>

    <div class="titulo">
        <h1 >Lista de Especialidades para los Docentes </h1>
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
                    <th> Descripcion</th>
                    <th> Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $especialidad ):?> 
                <tr >
                    <td>
                        <?php echo $especialidad->getDescripcion(); ?>
                    </td>
                    <td>
                        <div class="icon">
                        <?php if (($especialidad->getEstado())==2){?>

                                    <a href="dar_alta.php?id=<?php echo $especialidad->getIdEspecialidad()?>"><img class="icon-a" src="../../icon/alta.png" title="Dar Alta" alt="Dar Alta"></a>
                                
                        <?php }else{ ?>
                            <a href="#" onclick="consulta(<?php echo $especialidad->getIdEspecialidad();?>)"><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                            
                            <a href="modificar.php?id=<?php echo $especialidad->getIdEspecialidad(); ?>" class=""><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                        <?php } ?>
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
        <?php require_once "../../footer.php"?>                     
</body>

    <script>
        function consulta(idEspecialidad){

            if (confirm("¿Estas deguro que deseas eliminar?"))
            {
                window.location.href="dar_baja.php?id="+idEspecialidad;
            }
        }
    </script>
</html>