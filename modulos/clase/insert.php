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
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css">
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Nueva Clase</title>
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
    
    <div class="titulo">
        <h1>Nueva Clase</h1>
    </div>

    <div class="main">

        <form action="procesar_insert.php" method="POST" class="formInsertUnaColumna" id="formInsert" name="formInsert">
            
            <div class="formGrup" id="GrupocboCarrera">
                <label for="cboCarrera" class="formLabel">Carrera</label>
                    <div class="formGrupInput">
                        
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

                    </div>
                    <p class="formularioInputError"> Debe seleccionar una opcion. </p> 
            </div>
            
            <div class="formGrup" id="GrupocboMateria">
                <label for="cboMateria" class="formLabel">Materia</label>
                    <div class="formGrupInput">

                        <select name="cboMateria" id="cboMateria" onchange="cargarNumeroClase()">

                            <option value="0">
                                ->Seleccionar Materia<-
                            </option>

                        </select>
                    </div>
                    <p class="formularioInputError"> Debe seleccionar una opcion. </p> 
            </div>           
            
            <div class="formGrup" id="GrupoFecha">
                <label for="Fecha" class="formLabel">Fecha de la nueva clase</label>
                <div class="formGrupInput">
                    <input type="date" id="Fecha" name="fechaClase" class="fecha" value="<?php echo date("Y-m-d"); ?>">
                </div>
                <p class="formularioInputError"> Error en la fecha</p>
            </div>  
            
            <div class="formGrup" id="GrupocboTipoClase">
                <label for="cboTipoClase" class="formLabel">Tipo Clase</label>
                    <div class="formGrupInput">

                        <select name="cboTipoClase" id="cboTipoClase">
                            <?php foreach ($listaTiposClases as $tipo):?>
                                <option value = "<?php echo $tipo->getIdTipoClase()?>">
                                    <?php echo $tipo->getDetalle()?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                    <p class="formularioInputError"> Debe seleccionar una opcion. </p> 
            </div>
            
            <div>
            <input id="numeroClase" type="hidden" name="numeroClase" value=>
            </div>
            <div class="formGrupBtnEnviar">
                <button class="formButton" id="Guardar" type="submit" > Agregar Clase </button>
            </div>

        </form>

    </div>


</body>
</html>