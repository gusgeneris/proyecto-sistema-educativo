<?php
    require_once "../../class/Horario.php";

    $idDia=$_GET["id"];

    $respuesta="";

    $listado=Horario::listadoHorarioPorDia($idDia);
    
    foreach ($listado as $horario){
            $respuesta.="<tr><td><input type='checkbox' name='check_lista[]' value='". $horario->getNumero()."'></td>

                    <td>". $horario->getHoraInicio()."</td>

                    <td>". $horario->getHoraFin()."</td>
                    
                    </tr>";
    };

    echo $respuesta;

?>