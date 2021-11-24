<?php 
    require_once "../../class/CicloLectivo.php";
    require_once "../../class/Carrera.php";
    require_once "../../class/Materia.php";
    require_once "../../class/Docente.php";
    require_once "../../class/DetalleLibroTemas.php";
    require_once "../../class/Clase.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" >
    <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Alumnos</title>
    <script src ="../../script/comboCarrera.js"></script>
    <title>Busqueda de Clases</title>
</head>
<body>

    <?php 
        require_once "../../menu.php";
        $idPersona=$usuario->getIdPersona();
        $idDocente=Docente::obtenerPorIdPersona($idPersona);
        $anio=date("Y");
        $idCicloLectivo = CicloLectivo::obtenerIdCicloPorAnio($anio);
        $listaCarreras = Carrera::listaCarrerasPorDocente($idDocente,$idCicloLectivo);

        if (isset($_GET['idClase'])){
            $idClase = $_GET['idClase'];
            
            $listadoDetalle= DetalleLibroTemas::detalleLibroPorClase($idClase);
            $clase=Clase::mostrarPorId($idClase);
            $numeroClase=$clase->getNumeroClase();

            $idCarrera=$_GET['idCarrera'];
            $carrera=Carrera::listadoPorId($idCarrera);
            $nombreCarrera=$carrera->getNombre();

            $idMateria=$_GET['idMateria'];
            $materia=Materia::listadoPorId($idMateria);
            $nombreMateria=$materia->getNombre();
            
        }else {
            header("Location:inicio.php");}

            
    ?>
    <div class="titulo">
        <h1>Actividad realizada en la clase N°: <span><?php echo $numeroClase?></span><br>Materia: <span><?php echo $nombreMateria?></span><br>Carrera: <span><?php echo $nombreCarrera?></span></h1>
    </div>

    <div class="conteiner3Columnas" >
        <table class="tabla" id="table">

            <thead>
                <tr>
                    <th>Actividad</th>
                    <th>Observaciones</th>   
                </tr>
            </thead>

            <tbody>
                <?php foreach ($listadoDetalle as $detalle):?>
                <tr>
                    <td><?php echo $detalle->getTemaDia(); ?></td>
                    <td><?php echo $detalle->getObservaciones(); ?></td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>

    

    <div class="formGrupBtnEnviar central">
        <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false;">Atras</button>
    </div>

</body>
</html>