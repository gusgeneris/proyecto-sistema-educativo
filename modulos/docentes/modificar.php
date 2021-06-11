<?php
require_once "../../class/Docente.php";
require_once "../../class/Persona.php";
require_once "../../class/Sexo.php";
require_once "../../class/Perfil.php";
require_once "../../configs.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];    
}

$lista= Docente::obtenerTodoPorId($id);

$listaSexo=Sexo::sexoTodos();

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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar docente</title>
</head>
<?php require_once "../../menu.php";?>

<body class="modif-user">
    

    <form action="procesar_actualizar.php" method="POST"class="formulario">
        <h1 class="titulo">Ingrese los nuevos datos</h1>
    
    <?php foreach ($lista as $docente ):?> 
        <table>
            <div class=""> 
            <input name="idDocente" type="hidden" class="" value="<?php echo $docente->getIdDocente(); ?>">
            </div>
            <div> 
            <input name="IdPersona" type="hidden" class="" value="<?php echo $docente->getIdPersona(); ?>">
            </div>
            <div> nombre
            <input name="PersonaNom" type="text" class="" value="<?php echo $docente->getNombre(); ?>">
            </div>
            <div> apellido
            <input name="Apellido" type="text" class="" value="<?php echo $docente->getApellido(); ?>">
            </div>
            <div>nueva fecha nacimiento
            <input name="FechaNac" type="date" class="" value="<?php echo $docente->getFechaNacimiento(); ?>">
            </div>
            <div> dni
            <input name="Dni" type="text" class="" value="<?php echo $docente->getDni(); ?>">
            </div>
            <div> nacionalidad
            <input name="Nacionalidad" type="text" class="" value="<?php echo $docente->getNacionalidad(); ?>">
            </div>
            <div> Numero de Matricula
            <input name="NumMatricula" type="text" class="" value="<?php echo $docente->getNumMatricula(); ?>">
            </div>
            <div class="">
                <select name="Sexo" id="" class="">
                    <option value="NULL" class="">seleccione sexo</option>
                    <?php foreach($listaSexo as $sexo):?>
                    <option <?php if($sexo->getIdSexo()==$docente->getIdSexo()){echo "SELECTED";}?> value="<?php echo $sexo->getIdSexo(); ?>" class=""><?php echo $sexo->getDescripcion(); ?></option>
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