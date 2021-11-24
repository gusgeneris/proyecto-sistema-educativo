<?php
    require_once '../../class/MySql.php'; 
    require_once "../../class/Horario.php";
    require_once "../../class/Dia.php";
    require_once "../../class/Materia.php";
    require_once "../../class/AnioDesarrollo.php";
    require_once "../../class/PeriodoDesarrollo.php";
    require_once "../../class/Estado.php";
    require_once "../../configs.php";
    require_once "../../class/Carrera.php";
    require_once "../../class/CicloLectivo.php";
    

    $listaDias=Dia::obtenerTodo();
    $idCarrera=$_GET["idCarrera"];
    $idCicloLectivo=$_GET["idCiclo"];
    $materia=new Materia;
    $listadoMaterias=$materia->listadoPorIdCarrera($idCicloLectivo,$idCarrera);
    $listaHorario=Horario::listadoHorario();

    
    $idCicloLectivoCarrera=CicloLectivo::obtenerIdCicloLectivoCarrera($idCicloLectivo,$idCarrera);

    $carrera=Carrera::listadoPorId($idCarrera);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
        <link rel="stylesheet" href="/proyecto-modulos/style/styleFormInsert.css">
        <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
        <link rel="stylesheet" href="../../style/menuVertical.css">
        <script src="../../jquery3.6.js"></script>
        <script type="text/javascript" src="../../script/menu.js" defer> </script>
        <script src ="../../script/cargarHorarios.js"></script>
        <link rel="icon" type="image/jpg" href="../../image/logo.png">
        <title>Crear Horario</title>
    </head>
    <body>
    
<?php require_once "../../menu.php";?>

    <div class="titulo">
        <h1>Crear Horario para la carrera: <?php echo $carrera->getNombre()?></h1>
    </div>


    <div class="main">
        
        <form action="procesar_asignar.php" method="POST" class="formInsert2Columnas" >
            <input type="hidden" name="idCarrera" value="<?php echo $idCarrera ?>">
            <input type="hidden" name="idCicloLectivo" value="<?php echo $idCicloLectivo ?>">

            
            <select name="cboMateria" id="">

                <option value="">Seleccionar Materia</option>
                <?php foreach($listadoMaterias as $materia):?>
                    <option value="<?php echo $materia->getIdMateria()?>"> <?php echo $materia->getNombre()?></option>
                <?php endforeach?>        
            </select>


            <select name="cboDia" id="cboDia" onchange="cargarHorario()">

                <option value="">Seleccionar Dia</option>
                <?php foreach($listaDias as $dia):?>
                    <option value="<?php echo $dia->getIdDia()?>"> <?php echo $dia->getDescripcion()?></option>
                <?php endforeach?>        
            </select>
           
            <div class="conteiner3columnas">
                <table class="tabla">
                    <thead>
                        <tr>
                            <th>Asignar</th>
                            <th>Hora de Inicio</th>
                            <th>Hora de Finalizacion</th>
                        </tr>
                    </thead>
                    <tbody id=cuerpoTablaHorario>
                    
                
                    </tbody>
                </table>
            </div>

            <div class="formGrupBtnEnviar" >
                <button type="submit" class="formButton" value ="FormInsertAlumnos" id="Guardar"> Guardar</button>

                <button name="Cancelar" class="formButton" type="button" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false" >Cancelar</button>
            </div>

        </form>
        
    <?php 
        $anioDesarrollo=AnioDesarrollo::listaTodosActivos();
        $periodoDesarrollo=PeriodoDesarrollo::listaTodosActivos(); 
        $filtroAnio="";
        $filtroPeriodo="";                
    ?>

    </div>
       
        <div class="titulo">
            <h1>Horarios de la Carrera: <?php echo $carrera->getNombre()?></h1>
        </div><br>

        <div class="subtitulo">
            <h2>Buscar por Anio/Periodo de desarrollo</h2>
        </div>
            
            <div class="buscadorHorarios" >
                

                <form action="" method=POST class="formInsert3Columnas">
                    
                    
                    <div class="formGrup">
                        <label for="cboAnioDesarrollo" class="formLabel">Anio de desarrollo</label>
                        <select name="cboAnioDesarrollo" class="formInput" id="">
                            <?php foreach ($anioDesarrollo as $anio):
                                $fAnio= $anio->getIdAnioDesarrollo();
                                $filtroAnio= $fAnio;
                            ?>
                                <option value="<?php echo $anio->getIdAnioDesarrollo()?>"><?php echo $anio->getDetalleAnio()?></option>
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="formGrup">
                        <label for="cboPeriodoDesarrollo" class="formLabel">Periodo de desarrollo</label>
                        <select name="cboPeriodoDesarrollo" class="formInput" id="">
                            <?php foreach ($periodoDesarrollo as $periodo):   
                                $fPeriodo=  $periodo->getIdPeriodoDesarrollo();
                                $filtroPeriodo=$fPeriodo;
                            ?>
                                <option value="<?php echo $periodo->getIdPeriodoDesarrollo()?>"><?php echo $periodo->getDetallePeriodo()?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="formGrupBtnEnviar contacto">

                        <button type="submit" class="formButton" id='Guardar' value='FormInsertContacto'> Buscar</button>
                    
                    </div>

                </form>
            </div>

            <?php 
                if(isset($_POST['cboAnioDesarrollo'])){
                    $filtroAnio=$_POST['cboAnioDesarrollo'];
                }

                if(isset($_POST['cboPeriodoDesarrollo'])){
                    $filtroPeriodo=$_POST['cboPeriodoDesarrollo'];
                }
                $listadoHorariosConMaterias=Horario::listadoHorariosPorIdCicloLectivoCarrera($idCicloLectivoCarrera,$filtroAnio,$filtroPeriodo);
              
            ?>

            <div class="conteiner horario">

                <table class="tabla">

                    <thead>
                    
                        <tr>
                            <th>Modulo</th>
                            <?php foreach ($listaDias as $dia):?>
                                <th><?php echo $dia->getDescripcion();?></th>
                            
                            <?php endforeach;?>
                            <th>Horario</th>
                        </tr>
                    
                    </thead>

                    <tbody>
                        
                        <?php foreach ($listaHorario as $horario){?>
                            <?php $grilla_horario   =   $horario->getNumero();//Variable de control donde se almacena el horario actual ?>

                                <tr>
                                    <td><?php echo $horario->getNumero(); ?></td>

                                    <?php 
                                foreach ($listaDias as $dia) {	
                                    $grilla_dia   =   $dia->getIdDia();   //Variable de control donde se almacena el dia actual

                                    $contenidoCelda   =   "<td> </td>";   //Se setea el contenido de la celda (td) por defecto vacio
                                    
                                    foreach ($listadoHorariosConMaterias as list($nombreDia,$materia,$numero)) {	
                                        if (($grilla_dia == $nombreDia) && ($grilla_horario == $numero)) {
                                            //Si encuentra un acierto, se setea el nuevo contenido de la celda (td)
                                            $contenidoCelda   =   "<td>" . $materia . "</td>";
                                        }
                                    }

                                    echo $contenidoCelda;   //Se imprime la celda
                                }?>

                                    <td><?php echo $horario->getHoraInicio()."/".$horario->getHoraFin(); ?></td>
                                </tr>
                    <?php } ?>

                    </tbody>
                </table>
        </div>
    <?php require_once "../../footer.php"?>     
    </body>
</html>