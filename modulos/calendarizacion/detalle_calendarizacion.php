<?php
require_once "../../class/Carrera.php";
require_once "../../class/Calendarizacion.php";
require_once "../../class/DetalleCalendarizacion.php";
require_once "../../configs.php";



if(isset($_GET['idCurriculaCarrera'])){
    $idCurriculaCarrera=$_GET['idCurriculaCarrera'];
    $lista = DetalleCalendarizacion::listado($idCurriculaCarrera);
}else{

    $idCiclo= $_GET ['cboCicloLectivo'];
    $idCarrera= $_GET ['cboCarrera'];
    $idMateria= $_GET ['cboMateria'];

    $idCicloLectivoCarrera=Carrera::idCicloLectivoCarrera($idCiclo,$idCarrera);

    $idCurriculaCarrera=Carrera::idCurriculaCarrera($idCicloLectivoCarrera,$idMateria);

    $existencia=Calendarizacion::existenciaRelacion($idCurriculaCarrera);

    if ($existencia==0){
        ?> <section>
            <form action='procesar_nueva_calendarizacion.php' method='POST'>
                <button  type='submit' name='idCurriculaCarrera' value='<?php echo $idCurriculaCarrera?>'> Agregar Calendarizacion </button>
            </form>
        </section>
        <?php exit;
    }else{
    
        $lista = DetalleCalendarizacion::listado($idCurriculaCarrera);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css" class="">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="stylesheet" href="/proyecto-modulos/style/style.css">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Alumnos</title>
    <script type="text/javascript" src="../../script/validacion.js"></script>
</head>

<?php require_once "../../menu.php";?>

<body class="body-listuser">
    <br>
    
    <div><h1 class="titulo">Calendarizacion</h1></div>
    <br>

    <section>
        <form action="insert.php" method="POST">
            <button  type="submit" class="" name="agregarRegistro"> Agregar Registro </button>
        </form>
    </section>
    
    <table class="tabla" method="GET" id="table">
        <tr >
            <th> ID Detalle</th>
            <th> Numero de Clase</th>
            <th> Fecha Clase</th>
            <th> Actividad</th>
            <th> Contenido Priorizado</th>

            <th> Acciones</th>

        </tr>
        <?php foreach ($lista as $detalle ):?> 
            <tr >
                <td >
                    <?php echo $detalle->getIdDetalle(); ?>
                </td>
                <td>
                    <?php echo $detalle->getNumeroClase(); ?>
                </td>
                <td>
                    <?php echo $detalle->getFechaClase(); ?>
                </td>
                <td>
                    <?php echo $detalle->getActividad(); ?>
                </td>
                <td>
                    <?php echo $detalle->getContenidoPriorizado(); ?>
                </td>
                
                
               <td>
               <a href="../contactos/contactos.php?idPersona=<?php  ?>">Ver</a> 
               </td>
               <td>
               <a href="../domicilios/domicilios.php?idPersona=<?php ?>">Ver</a> 
               </td>
                <td>
                    <a href="dar_baja.php?id=<?php ?>" >Borrar</a>|
                    <a href="modificar.php?id=<?php ?>" >Modificar</a>|
                    <a href="asignarCarrera.php?idAlumno=<?php ?>" >Asignar Carrera</a>
                </td>

            </tr>
        <?php endforeach ?>    
    </table>
</body>
</html>