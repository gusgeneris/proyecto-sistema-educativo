<?php
require_once "../../class/Materia.php";
require_once "../../class/Estado.php";
require_once "../../configs.php";
require_once "../../class/Carrera.php";

$materia=new Materia();

if(isset($_GET["cboFiltroEstado"])){
    $filtroEstado=$_GET["cboFiltroEstado"];

} else{
    $filtroEstado=1;
    $idCarrera=$_GET["idCarrera"];
}

if(isset($_GET["txtNombre"])){
    $filtroNombre=$_GET["txtNombre"];
    $idCarrera=$_GET["idCarrera"];
} else{
    $filtroNombre="";
    $idCarrera=$_GET["idCarrera"];
}

if(isset($_GET['idCarrera'])){
    $idCarrera=$_GET["idCarrera"];
    $listadoMaterias=$materia->listadoPorIdCarrera($idCarrera,$filtroEstado,$filtroNombre);
}else{
    $listadoMaterias=$materia->listadoMaterias();
}
$mensaje='';

#highlight_string(var_export($listadoMaterias,true));

$carrera=Carrera::listadoPorId($idCarrera);

    
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
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css" class="">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Listado Materias</title>
</head>
<body class="body-listuser">


    <?php require_once "../../menu.php";?>
    <br>
    <br>
    <h1 class="titulo">Lista de Materias de la carrera de: <?php echo $carrera?></h1>
    <br>
    <br>
    <div><a href="../materias/asignar_materia.php?idCarrera=<?php echo $idCarrera?>">Asignar Materia</a></div>
    <br>
    <br>
    <table class="tabla">
        <th>Id materia</th>
        <th>Nombre</th>
        <th>Acciones</th>
        <tr>
            <?php foreach ($listadoMaterias as $materia):?>
            <tr>
                <td>
                    <?php echo $materia->getIdmateria()?>
                </td>
                <td>
                    <?php echo $materia->getNombre()?> 
                </td>
                <td>
                    <a href="eliminar_relacion.php?id=<?php echo $materia->getIdMateria()?>&idCarrera=<?php echo $idCarrera?>">borrar</a>  |  <a href="../eje_contenido/listado.php?idMateria=<?php echo $materia->getIdMateria()?>&idCarrera=<?php echo $idCarrera?>">Listado de contenido</a> |  <a href="../docentes/listado_por_carrera_materia.php?idMateria=<?php echo $materia->getIdMateria()?>&idCarrera=<?php echo $idCarrera?>">Listado de Docentes</a>
                </td>
                <?php endforeach?>
            </tr>
        </tr>
    </table>
</body>
</html>