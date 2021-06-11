<?php
    require_once '../../class/Sexo.php';
    require_once '../../class/MySql.php'; 
    require_once "../../configs.php";  
    
    $mensaje='';
    
    if(isset($_GET['mj'])){
        $mj=$_GET['mj'];
        if ($mj==CORRECT_INSERT_CODE){
            $mensaje=CORRECT_INSERT_MENSAJE;?>
            <div class="mensajes"><?php echo $mensaje;?></div><?php
        }
    };
?>
<?php  
    
    $listado=Sexo::sexoTodos();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar nuevo Docente</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body">

    <form action="procesador_insert_docente.php" method=POST class="formulario">
        <h1 class="titulo"> Registro de Docente</h1>
        <br><br>
        <div class=""><input type="text" name="NombrePers" class="" placeholder="Nombre"></div>
        <div class=""><input type="text" name="Apellido" class="" placeholder="Apellido"></div>
        <div class=""><input type="text" name="Dni" class="" placeholder="Dni"></div>
        <div class=""><input type="date" name="FechaNac" class="" placeholder="Fecha de Nacimiento"></div>
        <div class=""><input type="text" name="Nacionalidad" class="" placeholder="Nacionalidad"></div>
        <div class=""><input type="text" name="NumMatricula" class="" placeholder="Numero Matricula"></div>
        <div class="">
        <select name="Sexo" id="" class="">
                <option value="NULL" class="">seleccione sexo</option>
                <?php foreach($listado as $sexo):?>
                <option value="<?php echo $sexo->getIdSexo(); ?>" class=""><?php echo $sexo->getDescripcion(); ?></option>
                <?php endforeach?>
            </select>
        </div>
        <div class=""><input type="submit" class="" name="guardar" value="Guardar">
        <input name="Cancelar" type="submit" value="Cancelar">

        </div>

    </form>

</body>

</html>