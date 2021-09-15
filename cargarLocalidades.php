<?php

    $idProvincia=$_GET["id"];

    $respuesta='';

    if ($idProvincia==1){
        $respuesta.="<option value=1> Formosa </option>";
        
        $respuesta.="<option value=2> Formosa </option>";
        } else{
            
        "<option value=3> Resistencia </option>";
        

        #la clase de localidades se debe de conectar a la base de datos y desde este archivo 
        #debemos crear un ciclo para obtener las respuestas
    }

    echo $respuesta;






?>