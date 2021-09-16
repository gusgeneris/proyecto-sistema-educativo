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
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar Usuario</title>
</head>

<?php require_once "../../menu.php";?>

<body class="modif-user">

<h1 class="titulo">Ingrese los nuevos datos</h1>
    
<main>

    <form action="procesar_actualizar_alumno.php" method="POST"class="formModificar" id="formModificar" name="formModificar">
    
    <?php foreach ($lista as $alumno ):?> 
            <div> 
            <input name="IdAlumno" type="hidden" class="" value="<?php echo $alumno->getIdAlumno(); ?>">
            </div>

            <div> 
            <input name="IdPersona" type="hidden" class="" value="<?php echo $alumno->getIdPersona(); ?>">
            </div>

            <div class="formGrup" id="GrupoNombre" > 
                <label for="Nombre" class="formLabel">Nombre</label>
                
                <div class="formGrupInput"> 
                    <input name="PersonaNom" type="text" class="formInput" value="<?php echo $alumno->getNombre(); ?>">            
                </div>
                <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
<<<<<<< HEAD
            </div>

            <div class="formGrup" id="GrupoApellido" > 
                <label for="Apellido" class="formLabel">Apellido</label>
                
                <div class="formGrupInput"> 
                    <input name="Apellido" type="text" class="formInput" value="<?php echo $alumno->getApellido(); ?>">
=======
            </div>

            <div class="formGrup" id="GrupoApellido" > 
                <label for="Apellido" class="formLabel">Apellido</label>
                
                <div class="formGrupInput"> 
                    <input name="Apellido" type="text" class="formInput" value="<?php echo $alumno->getApellido(); ?>">
                </div>
                <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
            </div>

            <div class="formGrup" id="GrupoFechaNacimiento" > 
                <label for="FechaNacimiento" class="formLabel">Fecha Nacimiento</label> 
                
                <div class="formGrupInput">
                    <input name="FechaNac" type="date" class="formInput" value="<?php echo $alumno->getFechaNacimiento(); ?>">
>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780
                </div>
                <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
            </div>

<<<<<<< HEAD
            <div class="formGrup" id="GrupoFechaNacimiento" > 
                <label for="FechaNacimiento" class="formLabel">Fecha Nacimiento</label> 
                
                <div class="formGrupInput">
                    <input name="FechaNac" type="date" class="formInput" value="<?php echo $alumno->getFechaNacimiento(); ?>">
                </div>
                <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
            </div>

=======
>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780
            <div class="formGrup" id="GrupoDni" > 
                <label for="Dni" class="formLabel">Dni</label> 
                
                <div class="formGrupInput">
                    <input name="Dni" type="text" class="formInput" value="<?php echo $alumno->getDni(); ?>">
                </div>
                <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
            </div>

            <div class="formGrup" id="GrupoNacionalidad" > 
                <label for="Nacionalidad" class="formLabel">Nacionalidad</label> 
            
                <div class="formGrupInput">
                    <input name="Nacionalidad" type="text" class="formInput" value="<?php echo $alumno->getNacionalidad(); ?>">
                </div>

                <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
            </div>

            <div class="formGrup" id="GrupoNumLegajo" > 
                <label for="NumLegajo" class="formLabel">Numero de Legajo</label>
            
                <div class="formGrupInput">
                <input name="NumLegajo" type="text" class="formInput" value="<?php echo $alumno->getNumLegajo(); ?>">
                </div>
                <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
            </div>

<<<<<<< HEAD
            <div class="formGrup" id="GrupocboSexo">
                <label for="cboSexo" class="formLabel labelSexo">Sexo</label>
                <div class="formGrupInput">
                    <select id="cboSexo" class="formInput" required="required" name="cboSexo">
                        <option value="0">
                            -> Seleccione Sexo <-
                        </option>
                        <?php foreach($listadoSexo as $sexo):?>
                            <option <?php if($sexo->getIdSexo()==$alumno->getIdSexo()){echo "SELECTED";}?> value="<?php echo $sexo->getIdSexo();?>">
                                <?php echo $sexo->getDescripcion(); ?>
                            </option>
                        <?php endforeach?>
                    </select>
                </div>
                <p class="formularioInputError"> Debe seleccionar una opcion </p> 
=======
            <div class="formGrup" id="GrupoSexo">
                <label for="Sexo" class="formLabel labelSexo">Sexo</label>

                    <p class="MnsjSexo"> *Es obligatorio seleccionar alguna opcion </p>

                <select id="cboSexo" class="cboSexo" required="required" name="cboSexo" >
                    <option value="NULL" class="">seleccione sexo</option>
                        <?php foreach($listadoSexo as $sexo):?>
                    <option <?php if($sexo->getIdSexo()==$alumno->getIdSexo()){echo "SELECTED";}?> value="<?php echo $sexo->getIdSexo(); ?>" class=""><?php echo $sexo->getDescripcion(); ?></option>
                        <?php endforeach?>
                </select>
>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780
            </div>

            <!--Grupo de Mensaje-->
            
            <div class="formMensaje" id="GrupoMensaje">
                
                <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
            
            </div>

            <div> 
            <div class="formGrupBtnEnviar">
                <button type="submit" class="formButton" value ="FormInsertAlumnos" id="Guardar"> Guardar</button>
<<<<<<< HEAD
            </div>

            <div class="formGrupBtnEnviar">
                <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar onclick="window.history.go(-1); return false" >Cancelar</button>
            </div>

=======
            </div>

            <div class="formGrupBtnEnviar">
                <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar onclick="window.history.go(-1); return false" >Cancelar</button>
            </div>

>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780
    <?php endforeach ?>
    
    
    </form>
    </main>
    
</body>

<script type="text/javascript" src="../../script/validacionFormModificar.js"></script>
</html>