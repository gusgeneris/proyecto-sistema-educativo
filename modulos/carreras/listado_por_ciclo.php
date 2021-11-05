<?php
require_once "../../class/Carrera.php";
require_once "../../class/Estado.php";
require_once "../../configs.php";
require_once "../../class/CicloLectivo.php";

$carrera=new Carrera();

if(isset($_GET["cboFiltroEstado"])){
    $filtroEstado=$_GET["cboFiltroEstado"];
    $idCicloLectivo=$_GET["idCiclo"];
} else{
    $filtroEstado=1;
    $idCicloLectivo=$_GET["idCiclo"];
}

if(isset($_GET["txtNombre"])){
    $filtroNombre=$_GET["txtNombre"];
    $idCicloLectivo=$_GET["idCiclo"];
} else{
    $filtroNombre="";
    $idCicloLectivo=$_GET["idCiclo"];
}

if (isset($_GET["idCiclo"])){
    $idCicloLectivo=$_GET["idCiclo"];
    $listadoCarreras=$carrera->listadoCarrerasPorCicloLectivo($idCicloLectivo,$filtroEstado,$filtroNombre);
}else{
    $listadoCarreras=$carrera->listadoCarreras();
}

#highlight_string(var_export($listadoCarreras,true));


$mensaje='';
    
if(isset($_GET['mj'])){
    $mj=$_GET['mj'];
    if ($mj==CORRECT_INSERT_CODE){
        $mensaje=CORRECT_INSERT_MENSAJE;?>
        <div class="mensajes"><?php echo $mensaje;?></div><?php
    }else if($mj==CORRECT_UPDATE_CODE){
        $mensaje=CORRECT_UPDATE_MENSAJE;?>
        <div class="mensajes"><?php echo $mensaje;?></div><?php
    }else if($mj==INCORRECT_INSERT_MENSAJE_CARRERA_DUPLICATE_CODE){
        $mensaje=INCORRECT_INSERT_MENSAJE_CARRERA_DUPLICATE;?>
        <div class="mensajes"><?php echo $mensaje;?></div><?php
    }
};

$idCicloLectivo=$_GET["idCiclo"];
$cicloLectivo=CicloLectivo::obtenerTodoPorId($idCicloLectivo);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Listado Carreras</title>
    <title>Document</title>
</head>
<body class="body-listuser">


    <?php require_once "../../menu.php";?>

    <div class="titulo">
        <h1 class="titulo">Lista de Carreras del ciclo lectivo: <?php echo $cicloLectivo?> </h1>
    </div>
    
    
    
    <div class="conteiner-btn-agregar">
        <button type="button" class="btn-agregar" > <a href="../carreras/asignar_carrera.php?idCiclo=<?php echo $idCicloLectivo ?>">Asignar Carrera</a> </button>
    </div>

    <div class="conteiner3Columnas">
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
                            <a href="dar_baja.php?id=<?php echo $carrera->getIdCarrera()?>&idCiclo=<?php echo $idCicloLectivo?>"><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a> 
                            <a href="../../modulos/materias/listado_por_carrera?idCarrera=<?php echo $carrera->getIdCarrera()?>&idCiclo=<?php echo $idCicloLectivo?>"><img class="icon-a" src="../../icon/listado.png" title="Listado de Materias" alt="Listado de Materias"></a> 
                            <a href="../../modulos/carreras/asignar_alumno?idCarrera=<?php echo $carrera->getIdCarrera()?>&idCiclo=<?php echo $idCicloLectivo?>"><img class="icon-a" src="../../icon/asignar.png" title="Asignar Alumno" alt="Asignar Alumno"></a> 
                            <a href="../../modulos/horarios/crear_horario?idCarrera=<?php echo $carrera->getIdCarrera()?>&idCiclo=<?php echo $idCicloLectivo?>">Horario</a> 
                        </div>
                    </td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>

</body>
<footer >
    <div class="footer">
        <p class="diseñadorPor">Diseñado por Sandoval Gustavo 2021</p>
    </div>
</footer>
</html>