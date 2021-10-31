<?php
require_once "../../class/Usuario.php";
require_once "../../class/Persona.php";
require_once "../../class/Sexo.php";
require_once "../../class/Perfil.php";
require_once "../../configs.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];    
}

$usuario= Usuario::obtenerTodoPorId($id);

$listaSexo=Sexo::sexoTodos();

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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar Usuario</title>
</head>

<?php require_once "../../menu.php";?>

<body class="modif-user">
    <div class="titulo">
        <h1>Ingrese los nuevos datos</h1>
    </div>
    
    <div class="main">
        <form action="procesar_actualizar.php" method="POST" class="formModificar" id="formModificar" name="formModificar">

                <div class="formGrup" id="GrupoNombre" > 
                    <label for="Nombre" class="formLabel">Nombre</label> 
                    
                    <div class="formGrupInput">
                        <input name="Nombre" type="text" class="formInput" value="<?php echo $usuario->getNombre(); ?>">   
                    
                    </div>
                    <p class="formularioInputError"> La fecha de nacimiento no es necesariamente obligatoria.</p>         
                </div>
                

                <div class="formGrup" id="GrupoApellido" > 
                    <label for="Apellido" class="formLabel">Apellido</label> 
                    <div class="formGrupInput">
                        <input name="Apellido" type="text" class="formInput" value="<?php echo $usuario->getApellido(); ?>">
                    </div>
                    <p class="formularioInputError"> La fecha de nacimiento no es necesariamente obligatoria.</p>         
                </div>
                
                

                <div class="formGrup" id="GrupoFechaNacimiento" > 
                    <label for="FechaNacimiento" class="formLabel">Fecha Nacimiento</label> 
                    <div class="formGrupInput">
                        <input name="FechaNacimiento" type="date" class="formInput" value="<?php echo $usuario->getFechaNacimiento(); ?>">
                    </div>
                    <p class="formularioInputError"> La fecha de nacimiento no es necesariamente obligatoria.</p>
                </div>

                <div class="formGrup" id="GrupoDni" > 
                    <label for="Dni" class="formLabel">Dni</label> 
                    <div class="formGrupInput">
                        <input name="Dni" type="text" class="formInput" value="<?php echo $usuario->getDni(); ?>">
                    </div>
                    <p class="formularioInputError"> La fecha de nacimiento no es necesariamente obligatoria.</p>         
                </div>

                <div class="formGrup" id="GrupoNacionalidad" > 
                    <label for="Nacionalidad" class="formLabel">Nacionalidad</label>
                    <div class="formGrupInput"> 
                        <input name="Nacionalidad" type="text" class="formInput" value="<?php echo $usuario->getNacionalidad(); ?>">
                    </div>
                    <p class="formularioInputError"> La fecha de nacimiento no es necesariamente obligatoria.</p>         
                </div>

                <div class="formGrup" id="GrupoNombreUsuario" > 
                    <label for="NombreUsuario" class="formLabel">Nombre Usuario</label>
                    <div class="formGrupInput"> 
                        <input name="NombreUsuario" type="text" class="formInput" value="<?php echo $usuario->getNombreUsuario(); ?>">            
                    </div>
                
                    <p class="formularioInputError"> La fecha de nacimiento no es necesariamente obligatoria.</p>         
                </div>

                <div class="formGrup" id="GrupoContrasenia" > 
                    <label for="Contrasenia" class="formLabel">Contraseña</label>
                    <div class="formGrupInput"> 
                        <input name="Contrasenia" type="text" class="formInput" id="Contrasenia" value="<?php echo $usuario->getContrasenia(); ?>">            
                    </div>
                
                    <p class="formularioInputError"> La fecha de nacimiento no es necesariamente obligatoria.</p>         
                </div>

                <div class="formGrup" id="GrupoContrasenia2" >
                    <label for="Contrasenia2" class="formLabel">Validar Contraseña</label>
                    <div class="formGrupInput">
                        <input type="text" id='Contrasenia2' name="Contrasenia2" class="formInput" value="<?php echo $usuario->getContrasenia(); ?>">
                        
                        <i ><img class="formValidacionEstado"  src="" id="formValidacionEst"></i>
                    </div>
                    <p class="formularioInputError"> Las Contraseñas deben coincidir.</p>
                </div>

                <div class="formGrup" id="GrupocboSexo">
                    <label for="cboSexo" class="formLabel labelSexo">Sexo</label>
                    <div class="formGrupInput">
                        <select id="cboSexo" class="formInput" required="required" name="cboSexo">
                            <option value="0">
                                -> Seleccione Sexo <-
                            </option>
                            <?php foreach($listaSexo as $sexo):?>
                                <option <?php if($sexo->getIdSexo()==$usuario->getIdSexo()){echo "SELECTED";}?> value="<?php echo $sexo->getIdSexo();?>">
                                    <?php echo $sexo->getDescripcion(); ?>
                                </option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <p class="formularioInputError"> Debe seleccionar una opcion </p> 
                </div>



                <div class="formGrup" id="GrupocboPerfil">
                    <label for="cboPerfil" class="formLabel labelSexo">Perfil</label>
                    <div class="formGrupInput">
                        <select name="cboPerfil" id="cboPerfil" class="formInput" required="required">
                            <option value="0" class="">
                                    -->Seleccione Perfil<--
                            </option>
                            <?php foreach($listaPerfil as $perfil):?>
                            <option <?php if($perfil->getIdPerfil()==$usuario->getIdSexo()){echo "SELECTED";}?> value="<?php echo $perfil->getIdPerfil(); ?>">
                                <?php echo $perfil->getPerfilNombre();?>
                            </option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <p class="formularioInputError"> Debe seleccionar una opcion </p> 
                </div>
                
                
                <div> 
                    <input name="idUsuario" type="hidden" class="" value="<?php echo $usuario->getIdUsuario(); ?>">
                </div>

                <div> 
                    <input name="IdPersona" type="hidden" class="" value="<?php echo $usuario->getIdPersona(); ?>">
                </div>


                <!--Grupo de Mensaje-->
                
                <div class="formMensaje" id="GrupoMensaje">
                    
                    <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
                
                </div>

                
                <div class="formGrupBtnEnviar">
                    <button type="submit" class="formButton" value ="FormInsertAlumnos" id="Guardar"> Guardar</button>
                </div>

                <div class="formGrupBtnEnviar">
                    <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false;" >Cancelar</button>
                </div>
    
        </form>
    </div>
    
</body>
<script type="text/javascript" src="../../script/validacionFormModificar.js"></script>
</html>