<?php
require_once "class/Alumno.php";
require_once "class/Persona.php";
require_once "class/Sexo.php";
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

$lista= Alumno::obtenerTodoPorId($id);

$sexo=new Sexo();
$listado=[];
$listado=$sexo->sexoTodos();

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
    

    <form action="procesar_actualizar_alumno.php" method="POST"class="formulario">
        <h1 class="titulo">Ingrese los nuevos datos</h1>
    
    <?php foreach ($lista as $alumno ):?> 
        <table>
            <div class=""> 
            <input name="idAlumno" type="hidden" class="" value="<?php echo $alumno->getIdAlumno(); ?>">
            </div>
            <div> 
            <input name="IdPersona" type="hidden" class="" value="<?php echo $alumno->getIdPersona(); ?>">
            </div>
            <div> Nombre
            <input name="PersonaNom" type="text" class="" placeholder="<?php echo $alumno->getNombre(); ?>">
            </div>
            <div> Apellido
            <input name="Apellido" type="text" class="" placeholder="<?php echo $alumno->getApellido(); ?>">
            </div>
            <div>Nueva Fecha Nacimiento
            <input name="FechaNac" type="date" class="" placeholder="<?php echo $alumno->getFechaNacimiento(); ?>">
            </div>
            <div> Dni
            <input name="Dni" type="text" class="" placeholder="<?php echo $alumno->getDni(); ?>">
            </div>
            <div> Nacionalidad
            <input name="Nacionalidad" type="text" class="" placeholder="<?php echo $alumno->getNacionalidad(); ?>">
            </div>
            <div> Numero Legajo
            <input name="numLegajo" type="text" class="" placeholder="<?php echo $alumno->getNumLegajo(); ?>">
            </div>
            <div class="">
            <select name="Sexo" id="" class="">
                <option value="0" class="">seleccione sexo</option>
                <option value="1" class=""><?php echo $listado['0']; ?></option>
                <option value="2" class=""><?php echo $listado['1']; ?></option>
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