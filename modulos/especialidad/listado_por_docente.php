<?php
require_once "../../class/Especialidad.php";
require_once "../../class/Docente.php";

$especialidad=new Especialidad();

if(isset($_GET['idDocente'])){
    $idDocente=$_GET['idDocente'];
}else{
    header("Location:../../inicio.php");
};



$lista=Especialidad::listarPorDocente($idDocente);
#$lista=$especialidad->listaTodos();
#highlight_string(var_export($lista,true));

$docente=Docente::obtenerTodoPorId($idDocente);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css" class="">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista especialidads</title>

</head>
<?php require_once "../../menu.php";?>
<body class="body-listuser">
    <br>
    <br>
    <h1 class="titulo">Lista de Especialidades de <?php echo $docente?> </h1>
    <br>
    <br>
    <div><a href="../especialidad/asignar_especialidad.php?idDocente=<?php echo $idDocente?>">Asignar una Especialidad</a></div>
    <br>
    <br>

    <form >

    <table class="tabla" method="GET">
        <tr >
            <th> ID especialidad</th>
            <th> Descripcion</th>
            <th> Acciones</th>

        </tr>
        <?php foreach ($lista as $especialidad ):?> 
            <tr >
                <td >
                    <?php echo $especialidad->getIdEspecialidad(); ?>
                </td>

                <td>
                    <?php echo $especialidad->getDescripcion(); ?>
                </td>
                <td>
                    <a href="eliminar_relacion.php?id=<?php echo $especialidad->getIdEspecialidad(); ?>&idDocente=<?php echo $idDocente?>" class="">borrar</a>
                </td>
            </tr>
        <?php endforeach ?>
    
    </table>

</body>
</html>