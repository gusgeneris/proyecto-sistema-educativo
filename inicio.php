<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/tabla.css">
    <link rel="stylesheet" href="style/menu.css">
    <link rel="stylesheet" href="style/style.css">
    <script src="jquery3.6.js"></script>
    <link rel="icon" type="image/jpg" href="image/logo.png"><title>Inicio</title>
</head>
<body class="body-inicio">

<?php require_once "menu.php";?>

<div class="titulo-pagina-inicio"> 
    <h1 class="titulo">Bienvenido <?php echo $usuario;?></h1>
</div>



<?php 
    if($idPerfil==3):
        $idPersona=$usuario->getIdPersona();
        $idDocente=Docente::obtenerPorIdPersona($idPersona);
            
        $listaDias=Dia::obtenerTodo();
        $listaHorario=Horario::listadoHorario();
        $listadoHorariosConMaterias=Horario::listadoHorariosPorIdDocente($idDocente);
            
?>

    <div class="conteiner">

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
    <?php endif?>


</body>

<footer >
    <div class="footer">
        <p class="diseñadorPor">Diseñado por Sandoval Gustavo 2021</p>
    </div>
</footer>

<script type="text/javascript" src="script/menu.js"> </script>
</html>