<?php
require_once "../../class/Alumno.php";
require_once "../../class/Persona.php";
require_once "../../class/Sexo.php";
require_once "../../configs.php";


if(isset($_GET['id'])){
    $id=$_GET['id'];    
}

$lista= Alumno::obtenerTodoPorId($id);

$listadoSexo=Sexo::sexoTodos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar Usuario</title>
</head>

<?php require_once "../../menu.php";?>

<body class="modif-user">
    

    <form action="procesar_actualizar_alumno.php" method="POST"class="formulario">
        <h1 class="titulo">Ingrese los nuevos datos</h1>
    <br><br>
    
    <?php foreach ($lista as $alumno ):?> 
        <table>
            <div class=""> 
            <input name="idAlumno" type="hidden" class="" value="<?php echo $alumno->getIdAlumno(); ?>">
            </div>
            <div> 
            <input name="IdPersona" type="hidden" class="" value="<?php echo $alumno->getIdPersona(); ?>">
            </div>
            <div> Nombre
            <input name="PersonaNom" type="text" class="" value="<?php echo $alumno->getNombre(); ?>">
            </div>
            <div> Apellido
            <input name="Apellido" type="text" class="" value="<?php echo $alumno->getApellido(); ?>">
            </div>
            <div>Nueva Fecha Nacimiento
            <input name="FechaNac" type="date" class="" value="<?php echo $alumno->getFechaNacimiento(); ?>">
            </div>
            <div> Dni
            <input name="Dni" type="text" class="" value="<?php echo $alumno->getDni(); ?>">
            </div>
            <div> Nacionalidad
            <input name="Nacionalidad" type="text" class="" value="<?php echo $alumno->getNacionalidad(); ?>">
            </div>
            <div> Numero Legajo
            <input name="numLegajo" type="text" class="" value="<?php echo $alumno->getNumLegajo(); ?>">
            </div>
            <div class="">
            <select name="Sexo" id="" class="">
                <option value="NULL" class="">seleccione sexo</option>
                <?php foreach($listadoSexo as $sexo):?>
                <option <?php if($sexo->getIdSexo()==$alumno->getIdSexo()){echo "SELECTED";}?> value="<?php echo $sexo->getIdSexo(); ?>" class=""><?php echo $sexo->getDescripcion(); ?></option>
                <?php endforeach?>
            </select>
            </div>
            <div> 
            <input name="Guardar" type="submit" value="Actualizar" >
            <input name="Cancelar" type="submit" value="Cancelar">
            </div>
        </table>
    <?php endforeach ?>
    
    
    </form>
    
</body>
</html>