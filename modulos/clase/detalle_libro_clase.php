<?php 
    require_once "../../class/CicloLectivo.php";
    require_once "../../class/Carrera.php";
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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Alumnos</title>
    <script src ="../../jquery3.6.js"></script>
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
            
            $detalle= DetalleLibroTemas::detalleLibroPorClase($idClase);
            
        }else {
            header("Location:inicio.php");}

            
    ?>
    <div class="titulo">
        <h1>Actividad realizada en la clase</h1>
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
                <tr>
                    <td><?php echo $detalle->getTemaDia(); ?></td>
                    <td><?php echo $detalle->getObservaciones(); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    

    <div class="formGrupBtnEnviar">
        <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false;">Atras</button>
    </div>

</body>
</html>