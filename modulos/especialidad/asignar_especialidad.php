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
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar Especialidad</title>
    <title>Insertar</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body">

    

    <form action="procesar_asignar.php" method=POST class="formulario">
        <h1 class="titulo"> Registro de Especialidad</h1>
        <br>

        <div><a href="insert.php?idDocente=<?php echo $idDocente?>">Agregar nueva especialidad</a></div>

        <div><input type="hidden" name=IdDocente value=<?php echo $idDocente ?>></div>

        <br>

        <?php foreach ($listado as $especialidad):?>
        <tr>
            <td>
                <label for="">
                    <input type="checkbox" name="check_lista[]" value="<?php echo $especialidad->getIdEspecialidad()?>" 
                        <?php 
                            foreach ($listadoEspecialidadesActuales as $i ){ 
                                
                                if ($i==$especialidad->getIdEspecialidad()){echo "checked";}
                            }
                            ?>> 
                        <?php echo $especialidad->getDescripcion()?> 
                </label>
            </td>
            <br>
        <?php endforeach?>

        <br>

        <div class=""><input type="submit" class="" name="guardar" value="Guardar">
            <input name="Cancelar" type="submit" value="Cancelar">
        </div>               
    </form>

</body>

</html>