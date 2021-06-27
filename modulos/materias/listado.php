<?php
require_once "../../class/Materia.php";
require_once "../../class/Carrera.php";
require_once "../../class/Estado.php";
require_once "../../configs.php";

$materia=new Materia();

if(isset($_GET["cboFiltroEstado"])){
    $filtroEstado=$_GET["cboFiltroEstado"];

} else{
    $filtroEstado=1;

}

if(isset($_GET["txtNombre"])){
    $filtroNombre=$_GET["txtNombre"];

} else{
    $filtroNombre="";

}

$mensaje='';

#highlight_string(var_export($listadoMaterias,true));
$listadoMaterias=$materia->listadoMaterias($filtroEstado,$filtroNombre);

    
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
    <h1 class="titulo">Lista de Materias</h1>
    <br>
    <br>
    <form >
        &nbsp;&nbsp;&nbsp;&nbsp;
        <label> Estado: </label>
            <select name="cboFiltroEstado" id="" method="GET">
                <?php $listadoEstados= Estado::estadoTodos();
                    foreach($listadoEstados as $estado):?>
                <option value="<?php echo $estado->getIdEstado(); ?>" name=""><?php echo $estado->getDescripcion() ; ?></option>  
                <?php endforeach ?>
                <option value="0" class="">Todos</option>
            </select>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <label> Apellido: </label>
            <input type="text" name="txtNombre">
            <input type="submit" value="Filtrar">
    </form>
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
                    <a href="modificar.php?id=<?php echo $materia->getIdMateria()?>">modificar</a>  
                    |  <a href="dar_baja.php?id=<?php echo $materia->getIdMateria()?>">borrar</a>
                </td>
                <?php endforeach?>
            </tr>
        </tr>
    </table>
</body>
</html>