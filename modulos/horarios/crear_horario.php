<?php
    require_once '../../class/MySql.php'; 
    require_once "../../class/Horario.php";
    require_once "../../class/Dia.php";
    require_once "../../class/Materia.php";
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



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" >
            <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
        <title>Crear Horario</title>
    </head>
    <body>
    
<?php require_once "../../menu.php";?>
    <div class="">
        
        <form action="procesar_asignar.php" method="POST">
            <input type="hidden" name="idCarrera" value="<?php echo $idCarrera ?>">
            <input type="hidden" name="idCicloLectivo" value="<?php echo $idCicloLectivo ?>">

            
            <select name="cboMateria" id="">

                <option value="">Seleccionar Materia</option>
                <?php foreach($listadoMaterias as $materia):?>
                    <option value="<?php echo $materia->getIdMateria()?>"> <?php echo $materia->getNombre()?></option>
                <?php endforeach?>        
            </select>
            <br><br>


            <select name="cboDia" id="">

                <option value="">Seleccionar Dia</option>
                <?php foreach($listaDias as $dia):?>
                    <option value="<?php echo $dia->getIdDia()?>"> <?php echo $dia->getDescripcion()?></option>
                <?php endforeach?>        
            </select>
            <br><br>

            <?php foreach ($listaHorario as $horario):?>
                <input type="checkbox" name="check_lista[]" value="<?php echo $horario->getNumero() ?>">

                <?php echo $horario->getHoraInicio()?> - <?php echo $horario->getHoraFin()?>
                <br>
            <?php endforeach?>

            <div class="formGrupBtnEnviar" >
                <button type="submit" class="formButton" value ="FormInsertAlumnos" id="Guardar"> Guardar</button>
            </div>

            <div class="formGrupBtnEnviar" >
                <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false" >Cancelar</button>
            </div>

        </form>
        
    </div>

        <?php 
                $listadoHorariosConMaterias=Horario::listadoHorariosPorIdCicloLectivoCarrera($idCicloLectivoCarrera);
                    
        ?>

            <div class="conteiner">

                <table style="border:1px solid;">

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
                            <?php $grilla_horario   =   $horario->getNumero();   //Variable de control donde se almacena el horario actual ?>

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
    </body>
</html>