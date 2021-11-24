<?php

require_once "class/Alumno.php";
require_once "class/Carrera.php";
require_once "class/Docente.php";
require_once "class/Usuario.php";


$totalCarreras=Carrera::cantidadTotalCarreras();
$totalAlumnos=Alumno::cantidadTotalAlumnos();
$totalDocentes=Docente::cantidadTotalDocentes();


$listaUsuarios=Usuario::ultimosUsuariosRegistrados();

#Grafico de Torta para el dashboard
$listado=Alumno::obtenerGroupSexo();
$personasTotales=0;

foreach ($listado as list($tipoSexo,$cantidad)){
    $personasTotales+=$cantidad;
}


$dataPoints=[];

foreach($listado as list($tipoSexo,$cantidad)){
    array_push( $dataPoints,
        array("label"=>$tipoSexo, "y"=>(($cantidad*100)/$personasTotales))
    );
}

#Grafico de Barras para el dashboard
$listaCantAlumnos=Alumno::cantidadAlumnoPorCarrera();

$dataPointsBarras=[];

foreach($listaCantAlumnos as list($carrera,$cantidad)){
    array_push( $dataPointsBarras,
        array("label"=>$carrera, "y"=>$cantidad));
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="icon/">
        <link href="icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
        <link rel="stylesheet" href="style/tabla.css">
        <link rel="stylesheet" href="style/menuVertical.css">
        <link rel="stylesheet" href="style/dashboard.css">
        <link rel="stylesheet" href="style/mensaje.css">
        <script src="jquery3.6.js"></script>
        <script type="text/javascript" src="script/menu.js" defer> </script>
        <script> window.onload = function() {
            
            var chart = new CanvasJS.Chart("chartContainerTorta", {
                theme: "light2",
                animationEnabled: true,
                title: {
                    text: "Porcentaje del Sexo del Alumnado"
                },
                data: [{
                    type: "pie",
                    indexLabel: "{y}",
                    yValueFormatString: "#,##0.00\"%\"",
                    indexLabelPlacement: "inside",
                    indexLabelFontColor: "#36454F",
                    indexLabelFontSize: 18,
                    indexLabelFontWeight: "bolder",
                    showInLegend: true,
                    legendText: "{label}",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
            
            var chart = new CanvasJS.Chart("chartContainerBarras", {
                animationEnabled: true,
                theme: "light2",
                title:{
                    text: "Cantidad de alumnos en las Carreras"
                },
                axisY: {
                    title: "Alumnos"
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0.## Alumnos",
                    dataPoints: <?php echo json_encode($dataPointsBarras, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
            }  

        </script> <!-- Script del grafico -->

        <link rel="icon" type="image/jpg" href="image/logo.png"><title>Inicio</title>

    </head>

    <body class="body-listuser">

        <?php require_once "menu.php";
        
        require_once "mensaje.php";?>

        <!--<div class="titulo-pagina-inicio"> 
            <h1 class="titulo">Bienvenido <?php echo $usuario;?></h1>
        </div>-->
        <?php if($idPerfil==1):?>
            <div class="contenedorTarjetas">

                <div class="tarjeta alumno">
                    <div class="tarjetaTitulo">
                        <h2>Alumnos registrados</h2>
                    </div>

                    <div class="imagenTarjeta">
                        <img src="icon/graduado.png" alt="">
                    </div>

                    <div class="valorTarjeta">
                        <h2><?php echo $totalAlumnos?></h2>
                    </div>
                </div>

                <div class="tarjeta docente">
                    <div class="tarjetaTitulo">
                        <h2>Docentes registrados</h2>
                    </div>

                    <div class="imagenTarjeta">
                        <img src="icon/docente.png" alt="">
                    </div>

                    <div class="valorTarjeta">
                        <h2><?php echo $totalDocentes?></h2>
                    </div>

                </div>

                <div class="tarjeta carrera">
                    <div class="tarjetaTitulo">
                        <h2>Carreras registradas</h2>
                    </div>

                    <div class="imagenTarjeta">
                        <img src="icon/libros.png" alt="">
                    </div>

                    <div class="valorTarjeta">
                        <h2><?php echo $totalCarreras?></h2>
                    </div>

                </div>
            </div>

            <div id="chartContainerTorta" class="graficoTorta"></div>
            <div id="chartContainerBarras" class="graficoBarras"></div>

            

            <div class="ultimosUsuarios">
                <h2>Usuarios registrados recientemente</h2>
                <br>
                <table class="tabla" id="table">
                    <thead>
                        <tr>
                            <th>Nombre Usuario</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Perfil</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($listaUsuarios as list($nombreUser,$nombrePersona,$apellidoPersona,$perfilNombre)):?>
                            <tr>
                                <td><?php echo $nombreUser; ?></td>
                                <td><?php echo $nombrePersona; ?></td>
                                <td><?php echo $apellidoPersona; ?></td>
                                <td><?php echo $perfilNombre; ?></td>
                            </tr>
                    <?php endforeach?>
                    </tbody>
                </table>
            </div>

        <?php endif?>


        <?php 
            if($idPerfil==3):
                $idPersona=$usuario->getIdPersona();
                $idDocente=Docente::obtenerPorIdPersona($idPersona);

                $periodoDesarrollo= "";
                
                if(date('m')>6){
                    $periodoDesarrollo="segundo";
                }else{
                    $periodoDesarrollo="primer";
                }
                    
                $listaDias=Dia::obtenerTodo();
                $listaHorario=Horario::listadoHorario();
                $listadoHorariosConMaterias=Horario::listadoHorariosPorIdDocente($idDocente,$periodoDesarrollo);
                
                    
        ?>

        <div class="conteiner horario">

            <table class="tabla" id="tablaHorarios">

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
                                
                                foreach ($listadoHorariosConMaterias as list($nombreDia,$materia,$numero,$carrera)) {	
                                    if (($grilla_dia == $nombreDia) && ($grilla_horario == $numero)) {
                                        //Si encuentra un acierto, se setea el nuevo contenido de la celda (td)
                                        $contenidoCelda   =   "<td>" . $materia ." (".$carrera= substr($carrera, 0, 11).") </td>";
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
        <?php endif?>
        <div class="contenedorvacio"></div> 
    <?php require_once "footer.php"?>
                     
    </body>
<script src="script/horario.js"></script>
<script src="canvas.js"></script>
</html>