<?php

$mensaje='';

if(isset($_GET['mj'])){
    $error=$_GET['mj'];
    if ($error==ERROR_LOGIN_CODE){
        $mensaje=ERROR_LOGIN_MENSAJE;?>
        <div id="mensaje" class="mensaje"><?php echo $mensaje;?></div><?php
    }
    else if ($error==ERROR_LOGIN_CODE_INACTIVE_USER){
        $mensaje=ERROR_LOGIN_MENSAJE_INACTIVE_USER;?>
        <div id="mensaje" class="mensaje"><?php echo $mensaje;?></div><?php
    }
    else if ($error==ERROR_LOGIN_CODE_NULL_DATA){
        $mensaje=ERROR_LOGIN_MENSAJE_NULL_DATA;?>
        <div id="mensaje" class="mensaje"><?php echo $mensaje;?></div><?php
        
    }
    else if ($error==INCORRECT_SESSION_CODE){
        $mensaje=INCORRECT_SESSION_MENSAJE;?>
        <div id="mensaje" class="mensaje"><?php echo $mensaje;?></div><?php
        
    }  
    else if ($error==CORRECT_INSERT_CODE){
        $mensaje=CORRECT_INSERT_MENSAJE;?>
        <div id="mensaje" class="mensaje"><?php echo $mensaje;?></div><?php
    }
    else if ($error==CORRECT_UPDATE_CODE){
        $mensaje=CORRECT_UPDATE_MENSAJE;?>
        <div id="mensaje" class="mensaje"><?php echo $mensaje;?></div><?php
        
    }
    else if ($error==INCORRECT_INSERT_MENSAJE_CARRERA_DUPLICATE_CODE){
        $mensaje=INCORRECT_INSERT_MENSAJE_CARRERA_DUPLICATE;?>
        <div id="mensaje" class="mensaje"><?php echo $mensaje;?></div><?php
        
    }else if ($error==ERROR_LONGITUD_NAME_CODE){
        $mensaje=ERROR_LONGITUD_NAME;?>
        <div id="mensaje" class="mensaje"><?php echo $mensaje;?></div><?php
        
    }else if ($error==ERROR_LONGITUD_LAST_NAME_CODE){
        $mensaje=ERROR_LONGITUD_LAST_NAME;?>
        <div id="mensaje" class="mensaje"><?php echo $mensaje;?></div><?php
        
    }else if ($error==ERROR_LONGITUD_NATIONALITY_CODE){
        $mensaje=ERROR_LONGITUD_NATIONALITY;?>
        <div id="mensaje" class="mensaje"><?php echo $mensaje;?></div><?php
        
    }else if ($error==ERROR_NOT_NUMERIC_DNI_CODE){
        $mensaje=ERROR_NOT_NUMERIC_DNI;?>
        <div id="mensaje" class="mensaje"><?php echo $mensaje;?></div><?php
        
    }else if ($error==ERROR_LONGITUD_NUMERIC_DNI_CODE){
        $mensaje=ERROR_LONGITUD_NUMERIC_DNI;?>
        <div id="mensaje" class="mensaje"><?php echo $mensaje;?></div><?php
        
    }else if ($error==INCORRECT_SESSION_CODE){
        $mensaje=INCORRECT_SESSION_MENSAJE;?>
        <div id="mensaje" class="mensaje"><?php echo $mensaje;?></div><?php
        
    }else if ($error==ERROR_DATE_INCORRECT_CODE){
        $mensaje=ERROR_DATE_INCORRECT;?>
        <div id="mensaje" class="mensaje"><?php echo $mensaje;?></div><?php
        
    }else if ($error==ERROR_SEXO_INCORRECT_CODE){
        $mensaje=ERROR_SEXO_INCORRECT;?>
        <div id="mensaje" class="mensaje"><?php echo $mensaje;?></div><?php
        
    }else if ($error==ERROR_NAME_NO_PERMITE_NUMEROS_CODE){
        $mensaje=ERROR_NAME_NO_PERMITE_NUMEROS;?>
        <div id="mensaje" class="mensaje"><?php echo $mensaje;?></div><?php
        
    }else if ($error==ERROR_LAST_NAME_NO_PERMITE_NUMEROS_CODE){
        $mensaje=ERROR_LAST_NAME_NO_PERMITE_NUMEROS;?>
        <div id="mensaje" class="mensaje"><?php echo $mensaje;?></div><?php
        
    }else if ($error==ERROR_DNI_NUMBER_CODE){
        $mensaje=ERROR_DNI_NUMBER;?>
        <div id="mensaje" class="mensaje"><?php echo $mensaje;?></div><?php
        
    }else if ($error==ERROR_CAMPOS_VACIOS_CODE){
        $mensaje=ERROR_CAMPOS_VACIOS;?>
        <div id="mensaje" class="mensaje"><?php echo $mensaje;?></div><?php
        
    }else if ($error==CORRECT_DELETE_CODE){
        $mensaje=CORRECT_DELETE_MENSAJE;?>
        <div id="mensaje" class="mensaje"><?php echo $mensaje;?></div><?php
        
    }else if ($error==CORRECT_ALTA_CODE){
        $mensaje=CORRECT_ALTA_MENSAJE;?>
        <div id="mensaje" class="mensaje"><?php echo $mensaje;?></div><?php
        
    }else if ($error==CORRECT_ASIG_CODE){
        $mensaje=CORRECT_ASIG_MENSAJE;?>
        <div id="mensaje" class="mensaje"><?php echo $mensaje;?></div><?php
        
    }else if ($error==INCORRECT_INSERT_DOCENTE_DUPLICATE_CODE){
        $mensaje=INCORRECT_INSERT_DOCENTE_DUPLICATE;?>
        <div id="mensaje" class="mensaje"><?php echo $mensaje;?></div><?php
        
    }
};


?>

