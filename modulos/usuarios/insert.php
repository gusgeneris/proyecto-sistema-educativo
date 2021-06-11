<?php  
    require_once '../../class/Sexo.php';
    require_once '../../class/MySql.php'; 
    require_once "../../configs.php";  
    require_once "../../class/Perfil.php";

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

    $listaPerfil=Perfil::perfilTodos();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar nuevo Usuario</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body">

    <form action="procesador_insert.php" method=POST class="formulario">
        <h1 class="titulo"> Registro de Usuarios</h1>
        <br><br>
        <div class=""><input type="text" name="NombreUser" class="" placeholder="nombre usuario"></div>
        <div class=""><input type="text" name="Contrasenia" class="" placeholder="contraseña"></div>
        <div class=""><input type="text" name="NombrePers" class="" placeholder="nombre"></div>
        <div class=""><input type="text" name="Apellido" class="" placeholder="apellido"></div>
        <div class=""><input type="text" name="Dni" class="" placeholder="dni"></div>
        <div class=""><input type="date" name="FechaNac" class="" placeholder="fecha de nacimiento"></div>
        <div class=""><input type="text" name="Nacionalidad" class="" placeholder="nacionalidad"></div>
        <div class="">
        <select name="Sexo" id="" class="">
                <option value="NULL" class="">seleccione sexo</option>
                <?php foreach($listado as $sexo):?>
                <option value="<?php echo $sexo->getIdSexo(); ?>" class=""><?php echo $sexo->getDescripcion(); ?></option>
                <?php endforeach?>
            </select>
        </div>
        <div class="">
            <select name="Perfil" id="" class="">
                <option value="NULL" class="">seleccione perfil</option>
                <?php foreach($listaPerfil as $perfil):?>
                <option value="<?php echo $perfil->getIdPerfil(); ?>" class=""><?php echo $perfil->getPerfilNombre(); ?></option>
                <?php endforeach?>
            </select>
        </div>
        <br>
        <div class="">
        <input type="submit" class="" name="guardar" value="Guardar">
        <input name="Cancelar" type="submit" value="Cancelar">
        </div>

    </form>

</body>

</html>