<?php  
    require_once 'class/Sexo.php';
    require_once 'class/MySql.php'; 
    require_once "configs.php";  
    require_once "class/Perfil.php";
    
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
    $sexo=new Sexo();
    $listado=[];
    $listado=$sexo->sexoTodos();

    $perfil=new Perfil();
    $listPerfil=[];
    $listPerfil=$perfil->perfilTodos();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleInsert.css">
    <title>Insert</title>
</head>

<body class="body">

    <form action="procesador_insert.php" method=POST class="formulario">
        <h1 class="titulo"> Registro de Usuarios</h1>
        <div class=""><input type="text" name="NombreUser" class="" placeholder="nombre usuario"></div>
        <div class=""><input type="text" name="Contrasenia" class="" placeholder="contraseña"></div>
        <div class=""><input type="text" name="NombrePers" class="" placeholder="nombre"></div>
        <div class=""><input type="text" name="Apellido" class="" placeholder="apellido"></div>
        <div class=""><input type="text" name="Dni" class="" placeholder="dni"></div>
        <div class=""><input type="text" name="FechaNac" class="" placeholder="fecha de nacimiento"></div>
        <div class=""><input type="text" name="Nacionalidad" class="" placeholder="nacionalidad"></div>
        <div class="">
            <select name="Sexo" id="" class="">
                <option value="0" class="">seleccione sexo</option>
                <option value="1" class=""><?php echo $listado['0']; ?></option>
                <option value="2" class=""><?php echo $listado['1']; ?></option>
            </select>
        </div>
        <div class="">
            <select name="Perfil" id="" class="">
                <option value="0" class="">seleccione perfil</option>
                <option value="1" class=""><?php echo $listPerfil['0']; ?></option>
                <option value="2" class=""><?php echo $listPerfil['1']; ?></option>
                <option value="2" class=""><?php echo $listPerfil['2']; ?></option>
            </select>
        </div>
        <div class=""><input type="submit" class="" name="guardar">






        </div>

    </form>

</body>

</html>