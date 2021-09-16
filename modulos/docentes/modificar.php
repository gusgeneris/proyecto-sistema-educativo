<?php
require_once "../../class/Docente.php";
require_once "../../class/Persona.php";
require_once "../../class/Sexo.php";
require_once "../../class/Perfil.php";
require_once "../../configs.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];    
}

$docente= Docente::obtenerTodoPorId($id);

<<<<<<< HEAD
$listado=Sexo::sexoTodos();
=======
$listadoSexo=Sexo::sexoTodos();
>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780

$listaPerfil=Perfil::perfilTodos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar docente</title>
</head>
<?php require_once "../../menu.php";?>

<body class="modif-user">
    
    <h1 class="titulo">Ingrese los nuevos datos</h1>

    <main>

    <form action="procesar_actualizar.php" method="POST"class="formModificar" id="formModificar" name="formModificar">

        <div class=""> 
            <input name="idDocente" type="hidden" class="" value="<?php echo $docente->getIdDocente(); ?>">
        </div>

        <div> 
            <input name="IdPersona" type="hidden" class="" value="<?php echo $docente->getIdPersona(); ?>">
        </div>

        <div class="formGrup" id="GrupoNombre" > 
            <label for="Nombre" class="formLabel">Nombre</label> 
            
            <div class="formGrupInput">
                <input name="Nombre" type="text" class="formInput" value="<?php echo $docente->getNombre(); ?>">
            </div>
            <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
<<<<<<< HEAD
        </div>

        <div class="formGrup" id="GrupoApellido" > 
                <label for="Apellido" class="formLabel">Apellido</label>
            
            <div class="formGrupInput"> 
                <input name="Apellido" type="text" class="formInput" value="<?php echo $docente->getApellido(); ?>">
            </div>
            <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
        </div>

        <div class="formGrup" id="GrupoFechaNacimiento" > 
            <label for="FechaNacimiento" class="formLabel">Fecha Nacimiento</label> 
                
            <div class="formGrupInput">
                <input name="FechaNac" type="date" class="formInput" value="<?php echo $docente->getFechaNacimiento(); ?>">
=======
        </div>

        <div class="formGrup" id="GrupoApellido" > 
                <label for="Apellido" class="formLabel">Apellido</label>
            
            <div class="formGrupInput"> 
                <input name="Apellido" type="text" class="formInput" value="<?php echo $docente->getApellido(); ?>">
>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780
            </div>
            <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
        </div>

<<<<<<< HEAD
        <div class="formGrup" id="GrupoDni" > 
            <label for="Dni" class="formLabel">Dni</label> 
            
            <div class="formGrupInput">
                <input name="Dni" type="text" class="formInput" value="<?php echo $docente->getDni(); ?>">
=======
        <div class="formGrup" id="GrupoFechaNacimiento" > 
            <label for="FechaNacimiento" class="formLabel">Fecha Nacimiento</label> 
                
            <div class="formGrupInput">
                <input name="FechaNac" type="date" class="formInput" value="<?php echo $docente->getFechaNacimiento(); ?>">
>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780
            </div>
            <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
        </div>

<<<<<<< HEAD
        <div class="formGrup" id="GrupoNacionalidad" > 
            <label for="Nacionalidad" class="formLabel">Nacionalidad</label> 
            <div class="formGrupInput">
            
                <input name="Nacionalidad" type="text" class="formInput" value="<?php echo $docente->getNacionalidad(); ?>">
=======
        <div class="formGrup" id="GrupoDni" > 
            <label for="Dni" class="formLabel">Dni</label> 
            
            <div class="formGrupInput">
                <input name="Dni" type="text" class="formInput" value="<?php echo $docente->getDni(); ?>">
>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780
            </div>
            <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
        </div>

<<<<<<< HEAD

        <div class="formGrup" id="GrupoNumLegajo" > 
            
            <label for="NumMatricula" class="formLabel">Numero de Matricula</label>
            <div class="formGrupInput">
                <input name="NumMatricula" type="text" class="formInput" value="<?php echo $docente->getNumMatricula(); ?>">
=======
        <div class="formGrup" id="GrupoNacionalidad" > 
            <label for="Nacionalidad" class="formLabel">Nacionalidad</label> 
            <div class="formGrupInput">
            
                <input name="Nacionalidad" type="text" class="formInput" value="<?php echo $docente->getNacionalidad(); ?>">
>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780
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
                        <?php foreach($listado as $sexo):?>
                            <option <?php if($sexo->getIdSexo()==$docente->getIdSexo()){echo "SELECTED";}?> value="<?php echo $sexo->getIdSexo();?>">
                                <?php echo $sexo->getDescripcion(); ?>
                            </option>
                        <?php endforeach?>
                    </select>
                </div>
                <p class="formularioInputError"> Debe seleccionar una opcion </p> 
        </div>

=======

        <div class="formGrup" id="GrupoNumLegajo" > 
            
            <label for="NumMatricula" class="formLabel">Numero de Matricula</label>
            <div class="formGrupInput">
                <input name="NumMatricula" type="text" class="formInput" value="<?php echo $docente->getNumMatricula(); ?>">
            </div>
            <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
        </div>

        <div class="formGrup" id="GrupoSexo">
                <label for="Sexo" class="formLabel labelSexo">Sexo</label>
                    <p class="MnsjSexo"> *Es obligatorio seleccionar alguna opcion </p>

                <select id="cboSexo" class="cboSexo" required="required" name="cboSexo" >
                    <option value="NULL" class="">seleccione sexo</option>
                        <?php foreach($listadoSexo as $sexo):?>
                    <option <?php if($sexo->getIdSexo()==$docente->getIdSexo()){echo "SELECTED";}?> value="<?php echo $sexo->getIdSexo(); ?>" class=""><?php echo $sexo->getDescripcion(); ?></option>
                        <?php endforeach?>
                </select>
            </div>

>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780
            <!--Grupo de Mensaje-->
            
            <div class="formMensaje" id="GrupoMensaje">
                
                <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
            
            </div>

            <div> 
            <div class="formGrupBtnEnviar">
                <button type="submit" class="formButton" value ="FormInsertdocentes" id="Guardar"> Guardar</button>
            </div>

            <div class="formGrupBtnEnviar">
<<<<<<< HEAD
                <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false" >Cancelar</button>
=======
                <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar onclick="window.history.go(-1); return false" >Cancelar</button>
>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780
            </div>
    </form>
    
</body>

<script type="text/javascript" src="../../script/validacionFormModificar.js"></script>

</html>