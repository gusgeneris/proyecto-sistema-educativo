<?php
    require_once '../../class/CicloLectivo.php';
    require_once '../../class/PeriodoDesarrollo.php';
    require_once '../../class/AnioDesarrollo.php';
    require_once '../../class/Materia.php';
    require_once '../../class/Carrera.php';
    require_once '../../class/MySql.php'; 
    require_once "../../configs.php";  

    $idCarrera=$_GET["idCarrera"];

    $materia=new Materia();
    $listado=$materia->listadoMaterias();
    
    $idCicloLectivo=$_GET["idCiclo"];
    $listaAnioDesarrollo=AnioDesarrollo::listaTodos();
    $listaPeriodoDesarrollo=PeriodoDesarrollo::listaTodos();

    $carrera= Carrera::listadoPorId($idCarrera);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Asigar Docente</title>
    <title>Asignar</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body">

    <h3 class="titulo"> Asignar Materia a la Carrera: <?php echo $carrera ?> </h3>

    <form action="procesar_asignar.php" method=POST class="formInsertUnaColumno" id="formInsert" name="formInsert">

        <input type="hidden" name=IdCarrera value=<?php echo $idCarrera  ?>>
        <input type="hidden" name=IdCiclo value=<?php echo $idCicloLectivo  ?>>

        <br>

        <div class="">
            <select name="cboMateria" id="" class="">
                <option value="NULL" class="">Asigne Materia</option>
                <?php foreach($listado as $materia):?>
                <option value="<?php echo $materia->getIdMateria(); ?>" class=""><?php echo $materia?></option>
                <?php endforeach?>
            </select>
        </div>
        
        <div class="formGrup" id="GrupocboAnioDesarrollo">
            <label for="cboAnioDesarrollo" class="formLabel">Anio Desarrollo</label>
            <div class="formGrupInput">
                <Select name="cboAnioDesarrollo" id="cboAnioDesarrollo" class="formInput">
                    <option value="0">
                        ->Seleccionar Año de Desarrollo<-
                    </option>
                    <?php foreach($listaAnioDesarrollo as $anioDesarrollo):?>
                    <option value="<?php echo $anioDesarrollo->getIdAnioDesarrollo()?>">
                        <?php echo $anioDesarrollo->getDetalleAnio()?>
                    </option>
                    <?php endforeach?>
                </Select>
            </div>
        <p class="formularioInputError"> Debe seleccionar una opcion.</p> 
        </div>

        <div class="formGrup" id="GrupocboPeriodoDesarrollo">
            <label for="cboPeriodoDesarrollo" class="formLabel">Periodo Desarrollo</label>
            <div class="formGrupInput">
                <Select name="cboPeriodoDesarrollo" id="cboPeriodoDesarrollo" class="formInput">
                    <option value="0">
                        ->Seleccionar Año de Desarrollo<-
                    </option>
                    <?php foreach($listaPeriodoDesarrollo as $periodoDesarrollo):?>
                    <option value="<?php echo $periodoDesarrollo->getIdPeriodoDesarrollo()?>">
                        <?php echo $periodoDesarrollo->getDetallePeriodo()?>
                    </option>
                    <?php endforeach?>
                </Select>
            </div>
        <p class="formularioInputError"> Debe seleccionar una opcion.</p> 
        </div>

        <br>

        <div class=""><input type="submit" class="" name="guardar" value="Guardar">
            <input name="Cancelar" type="submit" value="Cancelar">
        </div>               
    </form>

</body>

</html>