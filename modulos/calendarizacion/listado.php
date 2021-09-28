<?php
require_once "../../class/Carrera.php";
require_once "../../class/Estado.php";
require_once "../../class/Materia.php";
require_once "../../class/Alumno.php";
require_once "../../configs.php";
require_once "../../class/CicloLectivo.php";


$listadoCicloLectivo= CicloLectivo::listaTodos();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../style/styleFormInsert.css">
        <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
        <script src ="../../jquery3.6.js"></script>
        <script src ="../../script/comboAsignarCarrera.js"></script>
        <title>Document</title>
    </head>

    <?php require_once "../../menu.php";?>

    <body>
    
        <form action="detalle_calendarizacion.php" method=GET class="formUnaColumna" id="formInsert" name="formInsert">
            <div class="formGrup" id="GrupocboCicloLectivo">
                <label for="cboCicloLectivo" class="formLabel">Carrera</label>
                <div class="formGrupInput">
                    <select name="cboCicloLectivo" id="cboCicloLectivo" class="formInput" onchange="cargarCarrera()">
                        <option value="">
                            ->Seleccione un Ciclo Lectivo<-
                        </option>
                        <?php foreach($listadoCicloLectivo as $cicloLectivo):{?>
                            <option value="<?php echo $cicloLectivo->getIdCicloLectivo();?>">
                                <?php echo $cicloLectivo->getAnio()?>
                            </option>
                        <?php } endforeach; ?>
                    </select>
                </div>
                <p class="formularioInputError"> El Nombre de Barrio no permite simbolos ni numeros.</p> 
            </div>


            <div class="formGrup" id="GrupocboCarrera">
                    <label for="cboCarrera" class="formLabel">Carrera</label>
                    <div class="formGrupInput">
                        <Select name="cboCarrera" id="cboCarrera" class="formInput" onchange="cargarMateria()">
                            <option value="0">
                                ->Seleccionar Carrera<-
                            </option>
                        </Select>
                    </div>
                    <p class="formularioInputError"> El Nombre de Barrio no permite simbolos ni numeros.</p> 
            </div>

            <div class="formGrup" id="GrupocboMateria">
                    <label for="cboMateria" class="formLabel">Materia</label>
                    <div class="formGrupInput">
                        <Select name="cboMateria" id="cboMateria" class="formInput" onchange="">
                            <option value="0">
                                ->Seleccionar Materia<-
                            </option>
                        </Select>
                    </div>
                    <p class="formularioInputError"> El Nombre de Barrio no permite simbolos ni numeros.</p> 
            </div>

            <!--Grupo de Mensaje-->
                
            <div class="formMensaje" id="GrupoMensaje">
                    
                <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
            
            </div>

            <!--Grupo de Boton Enviar-->

            <div class="formGrupBtnEnviar">
                <button type="submit" class="formButton" value ="FormInsertBuscarCalendarizacion" id="Guardar"> Buscar</button>
            </div>

            <div class="formGrupBtnEnviar">
                <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false">Cancelar</button>
            </div>


        </form>        

    </body>

    <script type="text/javascript" src="../../script/validacionFormInsert.js"></script>

</html>