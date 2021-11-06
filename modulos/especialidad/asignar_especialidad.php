<?php
    require_once '../../class/MySql.php'; 
    require_once "../../class/Especialidad.php";
    
    $mensaje='';
    
    if(isset($_GET['mj'])){
        $mj=$_GET['mj'];
        if ($mj==CORRECT_INSERT_CODE){
            $mensaje=CORRECT_INSERT_MENSAJE;?>
            <div class="mensajes"><?php echo $mensaje;?></div><?php
        }
    };

    $idDocente=$_GET["idDocente"];

    $listado=Especialidad::listaTodos();

    $especialidades=Especialidad::listarPorDocente($idDocente);
    $listadoEspecialidadesActuales=[];

    foreach ($especialidades as $i ){
       
            array_push($listadoEspecialidadesActuales, $i->getIdEspecialidad()); 
    }

    
    #highlight_string(var_export($listadoEspecialidadesActuales,true));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/tabla.css">
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar Especialidad</title>
    <title>Insertar</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body">
    <div class="titulo"><h1>Asignar epecialidad al docente</h1></div>

    <div class="conteiner-btn-agregar">
            <button type="button" class="btn-agregar" >
                <a href="insert.php?idDocente=<?php echo $idDocente?>">Agregar nueva especialidad</a>
            </button>
        </div>
    
    <div class="main">
        <form action="procesar_asignar.php" method=POST class="formulario">

            <div><input type="hidden" name=IdDocente value=<?php echo $idDocente ?>></div>

            <div class="conteiner3Columnas" >
                <table class="tabla" id="table">
                    <thead>
                        <tr>
                            <th>Asignado</th>
                            <th>Nombre de Especialidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listado as $especialidad):?>
                        <tr>
                            <td>
                                <input type="checkbox" name="check_lista[]" value="<?php echo $especialidad->getIdEspecialidad()?>" 
                                    <?php 
                                        foreach ($listadoEspecialidadesActuales as $i ){ 
                                            
                                            if ($i==$especialidad->getIdEspecialidad()){echo "checked";}
                                        }
                                    ?>> 
                            </td>
                            <td>
                                <?php echo $especialidad->getDescripcion()?> 
                            </td>
                        <tr>
                        <?php endforeach?>
                    </tbody>              
                </table>                        

            <div class="formGrupBtnEnviar" >
                <button type="submit" class="formButton" value ="FormInsertAlumnos" id="Guardar"> Guardar</button>
            </div>

            <div class="formGrupBtnEnviar" >
                <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false" >Cancelar</button>
            </div>           
        </form>
    </div>

</body>

</html>