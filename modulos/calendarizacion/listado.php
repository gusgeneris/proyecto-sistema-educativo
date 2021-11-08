<?php
require_once "../../class/Carrera.php";
require_once "../../class/Estado.php";
require_once "../../class/Materia.php";
require_once "../../class/Alumno.php";
require_once "../../configs.php";
require_once "../../class/CicloLectivo.php";
require_once "../../mensaje.php";


$anio=date("Y");
$idCicloLectivo=CicloLectivo::obtenerIdCicloPorAnio($anio);
$listadoMateria=Carrera::listadoCarrerasPorCicloLectivo($idCicloLectivo);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../style/styleFormInsert.css">
        <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
        <link rel="stylesheet" href="../../style/menuVertical.css">
        <script type="text/javascript" src="../../jquery3.6.js"></script>
        <script type="text/javascript" src="../../script/menu.js" defer> </script>
        <script type="text/javascript" src ="../../script/comboAsignarCarrera.js"></script>
        <link rel="icon" type="image/jpg" href="../../image/logo.png">
        <title>Calendarizacion</title>
    </head>

    <?php require_once "../../menu.php";?>

    <body>

        <div class="titulo"><h1>Busqueda Calendarizacion</h1></div>
    
        <div class="main">
            <form action="detalle_calendarizacion.php" method=GET class="formUnaColumna" id="formInsert" name="formInsert">
                
                <div class="formGrup" id="GrupocboCarrera">
                        <label for="cboCarrera" class="formLabel">Carrera</label>
                        <div class="formGrupInput">
                            <Select name="cboCarrera" id="cboCarrera" class="formInput" onchange="cargarMateria()">
                                <option value="0">
                                    ->Seleccionar Carrera<-
                                </option>
                                <?php foreach($listadoMateria as $carrera):{?>
                                    <option value="<?php echo $carrera->getIdCarrera()?>">
                                    <?php echo $carrera->getNombre()?>
                                </option>
                            <?php } endforeach; ?>
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
        </div>    
    <?php require_once "../../footer.php"?>                         
    </body>

    <script type="text/javascript" src="../../script/validacionFormInsert.js"></script>
    


</html>