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
    <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" >
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Listado Materias</title>
</head>



<body class="body-listuser">

    <?php require_once "../../menu.php";?>

    <div class="titulo">
        <h1>Lista de Materias</h1>
    </div>

    <div class="conteiner-btn-agregar">
        <button type="button" class="btn-agregar" > 
            <a href="insert.php">Agregar Nueva Materia</a> 
        </button>
    </div>

    <div class="conteiner-form-busqueda">
        <form >
            <div class="conteiner-form">
                <div>
                    <label class="label" for="selectEstado"> Estado: </label>
                        <select name="cboFiltroEstado" id="selectEstado" method="GET" class="cboSelect">
                            <?php $listadoEstados= Estado::estadoTodos();
                                foreach($listadoEstados as $estado):?>
                            <option value="<?php echo $estado->getIdEstado(); ?>" name=""><?php echo $estado->getDescripcion() ; ?></option>  
                            <?php endforeach ?>
                            <option value="0" class="">Todos</option>
                        </select>
                </div>
            
                <div>
                    <label class="label" for="nombreCarrera"> Nombre Materia: </label>
                        <input class="form-input" type="text" name="txtNombre" id="nombreCarrera">
                </div>
                <div class="conteiner-btn-filtrar">
                    <button class="btn-filtrar" type="submit" value="Filtrar"> Filtrar </button>
                </div>
            </div>
        </form>
    </div>
    
    <div class="conteiner3Columnas" id=>
        <table class="tabla">
            <thead>
                <th>Id materia</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php foreach ($listadoMaterias as $materia):?>
                <tr>
                    <td>
                        <?php echo $materia->getIdmateria()?>
                    </td>
                    <td>
                        <?php echo $materia->getNombre()?> 
                    </td>
                    <td>
                        <div class="icon">
                            <a href="modificar.php?id=<?php echo $materia->getIdMateria()?>"><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a> 
                            
                            <a href="dar_baja.php?id=<?php echo $materia->getIdMateria()?>"><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                        </div>
                    </td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>
</body>
</html>