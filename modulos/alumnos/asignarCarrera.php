<?php
require_once "../../class/Carrera.php";
require_once "../../class/Estado.php";
require_once "../../class/Materia.php";
require_once "../../class/Alumno.php";
require_once "../../configs.php";
require_once "../../class/CicloLectivo.php";
require_once "../../mensaje.php";

$idAlumno=$_GET["idAlumno"];
$nombreAlumno=Alumno::obtenerTodoPorId($idAlumno);
$listadoCicloLectivo= CicloLectivo::listaTodos();
$listadoCicloLectivoCarrera=Carrera::listadoCicloLectivoCarreraPorIdAlumno($idAlumno);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../style/styleFormInsert.css">
        <link rel="stylesheet" href="../../style/tabla.css">
        <link rel="stylesheet" href="/proyecto-modulos/style/menuVertical.css" class="">
        <script src ="../../jquery3.6.js"></script>
        <script src ="../../script/comboAsignarCarrera.js"></script>
        <title>Document</title>
    </head>

    

    <body>
        <?php require_once "../../menu.php";?>

        <div class="titulo">
            <h1> Asignar Carrera al Alumno/a :<?php echo $nombreAlumno->getNombre();?>, <?php echo $nombreAlumno->getApellido()?></h1>
        </div>

        <div class="main">

            <form action="procesar_asignar.php" method=POST class="formInsert3Columnas" id="formInsert" name="formInsert">

                <input type="hidden" value="<?php echo $idAlumno?>" name="IdAlumno">

                <div class="formGrup" id="GrupocboCicloLectivo">
                    <label for="cboCicloLectivo" class="formLabel">Ciclo Lectivo</label>
                    <div class="formGrupInput">
                        <select name="cboCicloLectivo" id="cboCicloLectivo" class="formInput" onchange="cargarCarrera()">
                            <option value="">
                                ->Seleccionar<-
                            </option>
                            <?php foreach($listadoCicloLectivo as $cicloLectivo):{?>
                                <option value="<?php echo $cicloLectivo->getIdCicloLectivo();?>">
                                    <?php echo $cicloLectivo->getAnio()?>
                                </option>
                            <?php } endforeach ; ?>
                        </select>
                    </div>
                    <p class="formularioInputError"> Debe sereccionar una opcion.</p> 
                </div>


                <div class="formGrup" id="GrupocboCarrera">
                        <label for="cboCarrera" class="formLabel">Carrera</label>
                        <div class="formGrupInput">
                            <Select name="cboCarrera" id="cboCarrera" class="formInput" onchange="">
                                <option value="0">
                                    ->Seleccionar<-
                                </option>
                            </Select>
                        </div>
                        <p class="formularioInputError"> Debe sereccionar una opcion.</p> 
                </div>

                <!--Grupo de Mensaje-->
                    
                <div class="formMensaje" id="GrupoMensaje">
                        
                    <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
                
                </div>

                <!--Grupo de Boton Enviar-->

                <div class="formGrupBtnEnviar3Columnas">
                    <button type="submit" class="formButton" value ="FormInsertAsignarCarrera" id="Guardar"> Guardar</button>
                
                    <button name="Cancelar" class="formButton" type="button" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false">Cancelar</button>
                </div>
            
            </form>
        </div>
        
        <div class="conteiner3Columnas">
            <table class="tabla">
                <thead>
                    <tr>
                        <th>Ciclo Lectivo</th>
                        <th>Carrera</th>    
                        <th>Accion</th>
                    </tr>
                </thead>     
                <tbody>           
                    <?php foreach ($listadoCicloLectivoCarrera as list($cicloLectivo,$carrera,$idCicloLectivoCarreraAlumno,$idCicloLectivoCarrera)): ?>

                    <tr>
                        <td><?php echo $cicloLectivo ?></td>
                        <td><?php echo $carrera ?></td>
                        <td>
                            <div class="icon">                           
                                <a href="eliminarRelacionCicloLecticoCarreraAlumno.php?id=<?php echo $idCicloLectivoCarreraAlumno?>&idAlumno=<?php echo $idAlumno?>">
                                <img class="icon-a" src="../../icon/basurero.png" title="Eliminar" alt="Eliminar"></a>
                                </a>
                                <a href="matriculacionAMaterias.php?id=<?php echo $idCicloLectivoCarrera?>&idAlumno=<?php echo $idAlumno?>">
                                    <img class="icon-a" src="../../icon/listado.png" title="Listado de Materias Asociadas" alt="Listado de Asociadas">
                                </a>
                            </div>
 
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
            
    <?php require_once "../../footer.php"?>   

    </body>

    <script type="text/javascript" src="../../script/validacionFormInsert.js"></script>
    
    

</html>