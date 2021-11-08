<?php
require_once "../../class/Carrera.php";
require_once "../../class/Estado.php";
require_once "../../configs.php"; 
require_once "../../mensaje.php";

$carrera=new Carrera();

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

$listadoCarreras=$carrera->listadoCarreras($filtroEstado,$filtroNombre);


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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Listado Carreras</title>
    <title>Document</title>
</head>
<body class="body-listuser">


    <?php require_once "../../menu.php";?>

    <div class="titulo">
        <h1 class="titulo">Lista de Carreras</h1>
    </div>

    <div class="conteiner-btn-agregar">
        <button type="button" class="btn-agregar" > <a href="insert.php"> Agregar Nueva Carrera</a> </button>
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
                    <label class="label" for="nombreCarrera"> Nombre Carrera: </label>
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
                <tr>
                    <th>Id Carrera</th>
                    <th>Nombre</th>
                    <th>Duracion en Años</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listadoCarreras as $carrera):?>
                    <tr>
                        <td>
                            <?php echo $carrera->getIdCarrera()?>
                        </td>
                        <td>
                            <?php echo $carrera->getNombre()?> 
                        </td>
                        <td>
                            <?php echo $carrera->getDuracionAnios()?>
                        </td>
                        
                        <td>
                            <div class="icon">
                            <a href="dar_baja.php?id=<?php echo $carrera->getIdCarrera()?>"><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a> 

                                <a href="modificar.php?id=<?php echo $carrera->getIdCarrera()?>"><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                                
                                <?php if (($carrera->getEstado())==2){?>
                                <a href="dar_alta.php?id=<?php echo $carrera->getIdCarrera()?>"> Dar Alta</a>
                                <?php } ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>
    <?php require_once "../../footer.php"?>                                 
</body>
</html>