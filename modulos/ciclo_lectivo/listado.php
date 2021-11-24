<?php
require_once "../../class/CicloLectivo.php";
require_once "../../configs.php";

if(isset($_GET["cboFiltroEstado"])){
    $filtroEstado=$_GET["cboFiltroEstado"];
} else{
    $filtroEstado=1;
}

if(isset($_GET["txtNombre"])){
    $filtroAnio=$_GET["txtNombre"];
} else{
    $filtroAnio="";
}


$lista=CicloLectivo::listaTodos($filtroEstado,$filtroAnio);


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
    <script type="text/javascript" src="../../script/estadosListado.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="stylesheet" href="../../style/mensaje.css">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Lista cicloLectivos</title>

</head>
<?php 
    require_once "../../mensaje.php";
    require_once "../../menu.php";
?>

<body class="body-listuser">
    
    <div class="titulo">
        <h1 class="titulo">Lista de Ciclos Lectivos</h1>
    </div>   
    <div class="conteiner-btn-agregar">
        <button type="button" class="btn-agregar" > <a href="insert.php"> Agregar Nuevo Ciclo </a> </button>
    </div>

    <div class="conteiner-form-busqueda">
            <form >
                <div class="conteiner-form">
                    <div>
                        <label class="label" for="selectEstado"> Estado: </label>
                            <select name="cboFiltroEstado" id="selectEstado" method="GET" class="cboSelect">
                                <option value="0" class="">Todos</option>
                                <option value="1" class="">Activo</option>
                                <option value="2" class="">Inactivo</option>
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

    <div class="conteiner3Columnas" >
        <table class="tabla" id="table">
            <thead>
                <tr >
                    <th> Estado</th>
                    <th> Año</th>
                    <th> Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $cicloLectivo ):?> 
                    <tr >
                        <td >
                            <?php if(($cicloLectivo->getEstado())==1)
                                {echo "Activo";}
                                else{
                                    echo "Inactivo";}  ?>
                        </td>
                        <td>
                            <?php echo $cicloLectivo->getAnio(); ?>
                        </td>
                        <td>
                            <div class="icon">

                                <a href="#" onclick="consulta(<?php echo $cicloLectivo->getIdCicloLectivo()?>)"><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a></a> 

                                <a href="modificar.php?id=<?php echo $cicloLectivo->getIdCicloLectivo(); ?>" class=""><img class="icon-a" src="../../icon/modificar.png" title="Modificar" alt="Modificar"></a>
                                
                                <a href="../carreras/listado_por_ciclo.php?idCiclo=<?php echo $cicloLectivo->getIdCicloLectivo(); ?>" class=""><img class="icon-a" src="../../icon/listado.png" title="Lista Carreras Asociadas" alt="Lista Carreras Asociadas"></a>
                            
                                <?php if (($cicloLectivo->getEstado())==2){?>
                                        <a href="dar_alta.php?id=<?php echo $cicloLectivo->getIdCicloLectivo();?>"><img class="icon-a" src="../../icon/alta.png" title="Dar Alta" alt="Dar Alta"></a>
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
        function consulta(idCicloLectivo){

            if (confirm("¿Estas deguro que deseas eliminar?"))
            {
                window.location.href="dar_baja.php?id="+idCicloLectivo;
            }
        }
    </script>

</html>