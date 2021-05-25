<?php
require_once "class/Usuario.php";
require_once "class/Persona.php";
require_once "class/Sexo.php";
require_once "class/Perfil.php";
require_once "configs.php";

session_start();

if(isset($_SESSION['usuario'])){
    $usuario=$_SESSION['usuario'];
}
else{header("Location:test_login.php?error=".INCORRECT_SESSION_CODE);
exit;}

if(isset($_GET['id'])){
    $id=$_GET['id'];    
}

$lista= Usuario::obtenerTodoPorId($id);

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
    <title>Document</title>
</head>
<header class="">
    <nav>
        <a><img class="logob" src="image/logo.png" href="inicio.php"></a>
    
        <a class="frasecabeza" href="inicio.php">S.I.G.E</a>
    </nav>
</header>
<body class="modif-user">
    

    <form action="procesar_actualizar.php" method="POST"class="formulario">
        <h1 class="titulo">Ingrese los nuevos datos</h1>
    
    <?php foreach ($lista as $usuario ):?> 
        <table>
            <div class=""> 
            <input name="idUsuario" type="hidden" class="" value="<?php echo $usuario->getIdUsuario(); ?>">
            </div>
            <div> 
            <input name="IdPersona" type="hidden" class="" value="<?php echo $usuario->getIdPersona(); ?>">
            </div>
            <div> nombre
            <input name="PersonaNom" type="text" class="" placeholder="<?php echo $usuario->getNombre(); ?>">
            </div>
            <div> apellido
            <input name="Apellido" type="text" class="" placeholder="<?php echo $usuario->getApellido(); ?>">
            </div>
            <div>nueva fecha nacimiento
            <input name="FechaNac" type="date" class="" placeholder="<?php echo $usuario->getFechaNacimiento(); ?>">
            </div>
            <div> dni
            <input name="Dni" type="text" class="" placeholder="<?php echo $usuario->getDni(); ?>">
            </div>
            <div> nacionalidad
            <input name="Nacionalidad" type="text" class="" placeholder="<?php echo $usuario->getNacionalidad(); ?>">
            </div>
            <div> nombre usuario
            <input name="UsuarioNom" type="text" class="" placeholder="<?php echo $usuario->getNombreUsuario(); ?>">
            </div>
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
            <div> 
            <input name="Guardar" type="submit" value="Guardar" >
            <input name="Cancelar" type="submit" value="Cancelar">
            </div>
        </table>
    <?php endforeach ?>
    
    
    </form>
    
</body>
</html>