<?php
require_once "../../class/Especialidad.php";
require_once "../../class/Docente.php";
require_once "../../mensaje.php";

$especialidad=new Especialidad();

if(isset($_GET['idDocente'])){
    $idDocente=$_GET['idDocente'];
}else{
    header("Location:../../inicio.php");
};



$lista=Especialidad::listarPorDocente($idDocente);

$docente=Docente::obtenerTodoPorId($idDocente);


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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista especialidads</title>

</head>
<?php require_once "../../menu.php";?>
<body class="body-listuser">
    <div class="titulo">
        <h1 class="titulo">Lista de Especialidades de <?php echo $docente?> </h1>
    </div>

    <div class="conteiner-btn-agregar">
        <button type="button" class="btn-agregar" > 
            <a href="../especialidad/asignar_especialidad.php?idDocente=<?php echo $idDocente?>">Asignar una Especialidad</a>
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
                            <a href="eliminar_relacion.php?id=<?php echo $especialidad->getIdEspecialidad(); ?>&idDocente=<?php echo $idDocente?>" class=""><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                            <a href="modificar.php?id=<?php echo $especialidad->getIdEspecialidad(); ?>" class=""><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
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