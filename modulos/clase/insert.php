<?php 
    require_once "../../class/CicloLectivo.php";
    require_once "../../class/Carrera.php";
    require_once "../../class/Docente.php";
    require_once "../../class/TipoClase.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <script src ="../../jquery3.6.js"></script>
    <script src ="../../script/comboCarrera.js"></script>
    <title>Nueva Clase</title>
</head>
<body>

    <?php 
        require_once "../../menu.php";
        $idPersona=$usuario->getIdPersona();
        $idDocente=Docente::obtenerPorIdPersona($idPersona);
        $anio=date("Y");
        $idCicloLectivo = CicloLectivo::obtenerIdCicloPorAnio($anio);
        $listaCarreras = Carrera::listaCarrerasPorDocente($idDocente,$idCicloLectivo);
        $listaTiposClases= TipoClase:: obtenerTodos(); 
    ?>
    

<div>
    <form action="procesar_insert.php" method="POST">

    <select name="cboCarrera" id="cboCarrera" onchange="cargarMaterias()">

        <option value="0">
            ->Seleccionar Carrera<-
        </option>
            <?php foreach ($listaCarreras as $carrera): ?>
        <option value="<?php echo $carrera->getIdCarrera() ?>">
            <?php echo $carrera->getNombre() ?>
        </option>
            <?php endforeach; ?>

    </select>

    <select name="cboMateria" id="cboMateria" onchange="cargarNumeroClase()">

        <option value="0">
            ->Seleccionar Materia<-
        </option>

    </select>
    
    <div class="grupNumeroClase">
        <input id="numeroClase" type="hidden" name="numeroClase" value=>
    </div>

    <input type="date" name="fechaClase" value="<?php echo date("Y-m-d"); ?>">
    
    <select name="cboTipoClase" id="cboTipoClase">
        <?php foreach ($listaTiposClases as $tipo):?>
            <option value = "<?php echo $tipo->getIdTipoClase()?>">
                <?php echo $tipo->getDetalle()?>
            </option>
        <?php endforeach; ?>
    </select>
        
    <button type="submit" > Agregar Clase </button>

    </form>

</div>


</body>
</html>