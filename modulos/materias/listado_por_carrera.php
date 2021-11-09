<?php
require_once "../../class/Materia.php";
require_once "../../class/Estado.php";
require_once "../../configs.php";
require_once "../../class/Carrera.php";
require_once "../../mensaje.php";

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

$idCarrera=$_GET["idCarrera"];
$idCicloLectivo=$_GET["idCiclo"];
$listadoMaterias=$materia->listadoPorIdCarrera($idCicloLectivo,$idCarrera,$filtroEstado,$filtroNombre);


$carrera=Carrera::listadoPorId($idCarrera);


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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Listado Materias</title>
</head>

<body class="body-listuser">


    <?php require_once "../../menu.php";?>
    
    <div class="titulo">
        <h1 >Lista de Materias de la carrera de: <?php echo $carrera?></h1>
    </div>

    <div class="conteiner-btn-agregar">
        <button type="button" class="btn-agregar">
            <a href="../materias/asignar_materia.php?idCarrera=<?php echo $idCarrera?>&idCiclo=<?php echo $idCicloLectivo?>">Asignar Materia</a>
        </button>
    </div>
    
    <div class="conteiner3Columnas" id=>
        <table class="tabla">
            <thead>
                <tr>
                    <th>Id materia</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
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
                            <div class="icon">
                                <a href="eliminar_relacion.php?id=<?php echo $materia->getIdMateria()?>&idCarrera=<?php echo $idCarrera?>&idCicloLectivo=<?php echo $idCicloLectivo ?>"><img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                                <a href="../eje_contenido/listado_por_materia.php?idMateria=<?php echo $materia->getIdMateria()?>&idCarrera=<?php echo $idCarrera?>&idCicloLectivo=<?php echo $idCicloLectivo?>"><img class="icon-a" src="../../icon/ejeContenido.png" title="Eje de contenido" alt="Eje de contenido"></a>
                                <a href="../docentes/listado_por_carrera_materia.php?idMateria=<?php echo $materia->getIdMateria()?>&idCarrera=<?php echo $idCarrera?>&idCicloLectivo=<?php echo $idCicloLectivo?>"><img class="icon-a" src="../../icon/listadoPersona.png" title="Listado de Docentes" alt="Listado de Docentes"></a>
                                <a href="../asistencia/procesar_busqueda_asistencia.php?idMateria=<?php echo $materia->getIdMateria()?>&idCarrera=<?php echo $idCarrera?>&idCicloLectivo=<?php echo $idCicloLectivo?>"><img class="icon-a" src="../../icon/asistencia.png" title="Asistencia" alt="Asistencia"></a>
                            </div>
                        </td>
                        <?php endforeach?>
                    </tr>
                </tr>
            </tbody>
        </table>
    </div>
        <?php require_once "../../footer.php"?> 
</body>
</html>