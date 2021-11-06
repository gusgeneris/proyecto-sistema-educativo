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
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar nuevo Usuario</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body">

<h1 class="titulo"> Registro de Usuario</h1>

<main>
    <form action="procesador_insert.php" method=POST class="formInsert" id="formInsert" name="formInsert">
            
            <!--Grupo de NombreUsuario-->
            
            <div class="formGrup" id="GrupoNombreUsuario" >
                <label for="NombreUsuario" class="formLabel">Nombre Usuario</label>
                <div class="formGrupInput">
                    <input type="text" id='NombreUsuario' name="NombreUsuario" class="formInput" placeholder="NombreUsuario">
                    
                    <i ><img class="formValidacionEstado"  src="" id="formValidacionEst"></i>
                </div>
                <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
            </div>
            <!--Grupo de Contraseña-->
            
            <div class="formGrup" id="GrupoContrasenia" >
                <label for="Contrasenia" class="formLabel">Contrasenia</label>
                <div class="formGrupInput">
                    <input type="text" id='Contrasenia' name="Contrasenia" class="formInput" placeholder="Contraseña">
        
                    <i ><img class="formValidacionEstado"  src="" id="formValidacionEst"></i>
                </div>
                <p class="formularioInputError"> El Contrasenia no debe contener numeros ni simbolos.</p>
            </div>

            <!--Grupo de Contrasenia2-->
            
            <div class="formGrup" id="GrupoContrasenia2" >
                <label for="Contrasenia2" class="formLabel">Vuelva a ingresar su Contraseña</label>
                <div class="formGrupInput">
                    <input type="text" id='Contrasenia2' name="Contrasenia2" class="formInput" placeholder="Contraseña">
                    
                    <i ><img class="formValidacionEstado"  src="" id="formValidacionEst"></i>
                </div>
                <p class="formularioInputError"> Las Contraseñas deben coincidir.</p>
            </div>

            <!--Grupo de Nombre-->
            
            <div class="formGrup" id="GrupoNombre" >
                <label for="Nombre" class="formLabel">Nombre</label>
                <div class="formGrupInput">
                    <input type="text" id='Nombre' name="Nombre" class="formInput" placeholder="Nombre">
                    
                    <i ><img class="formValidacionEstado"  src="" id="formValidacionEst"></i>
                </div>
                <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
            </div>

            <!--Grupo de Apellido-->
                
            <div class="formGrup" id="GrupoApellido">
                    <label for="Apellido" class="formLabel">Apellido</label>
                    <div class="formGrupInput">
                        <input type="text" id='Apellido' name="Apellido" class="formInput" placeholder="Apellido">

                        <i ><img class="formValidacionEstado"  src="" id="formValidacionEst"></i>
                    </div>
                    <p class="formularioInputError"> El Apellido no debe contener numeros ni simbolos.</p>
            </div>    

            <!--Grupo de Dni-->
                
            <div class="formGrup" id="GrupoDni">
                    <label for="Dni" class="formLabel">Dni</label>
                    <div class="formGrupInput">
                        <input type="text" id='Dni' name="Dni" class="formInput" placeholder="Dni">
                        <i ><img class="formValidacionEstado"  src="" id="formValidacionEst"></i>
                    </div>
                    <p class="formularioInputError"> El Dni no debe contener letras ni simbolos.</p>
            </div>  

            <!--Grupo de Fecha-->
                
            <div class="formGrup" id="GrupoFecha">
                    <label for="Fecha" class="formLabel">Fecha Nacimiento</label>
                    <div class="formGrupInput">
                        <input type="date" id='FechaNacimiento' name="FechaNacimiento" class="formInput" placeholder="Fecha">
                        <i ><img class="formValidacionEstado"  src="" id="formValidacionEst"></i>
                    </div>
                    <p class="formularioInputError"> La fecha de nacimiento no es necesariamente obligatoria.</p>
            </div>
            
            <!--Grupo de Nacionalidad-->
                
            <div class="formGrup" id="GrupoNacionalidad">
                    <label for="Nacionalidad" class="formLabel">Nacionalidad</label>
                    <div class="formGrupInput">
                        <input type="text" id='Nacionalidad' name="Nacionalidad" class="formInput" placeholder="Nacionalidad">
                        <i ><img class="formValidacionEstado"  src="" id="formValidacionEst"></i>
                    </div>
                    <p class="formularioInputError"> La Nacionalidad no es necesariamente obligatoria.</p>
            </div>

            <!--Grupo de Sexo-->

            <div class="formGrup" id="GrupocboSexo">
                <label for="cboSexo" class="formLabel labelSexo">Sexo</label>
                <div class="formGrupInput">
                    <select id="cboSexo" class="formInput" required="required" name="cboSexo">
                        <option value="0">
                            -> Seleccione Sexo <-
                        </option>
                        <?php foreach($listado as $sexo):?>
                        <option value="<?php echo $sexo->getIdSexo(); ?>">
                            <?php echo $sexo->getDescripcion(); ?>
                        </option>
                        <?php endforeach?>
                    </select>
                </div>
                <p class="formularioInputError"> Debe seleccionar una opcion </p> 
             </div>

             <!--Grupo de Perfil-->
             <div class="formGrup" id="GrupocboPerfil">
                <label for="cboPerfil" class="formLabel labelSexo">Perfil</label>
                <div class="formGrupInput">
                    <select name="cboPerfil" id="cboPerfil" class="formInput" required="required">
                        <option value="0" class="">
                                -->Seleccione Perfil<--
                        </option>
                        <?php foreach($listaPerfil as $perfil):?>
                        <option value="<?php echo $perfil->getIdPerfil();?>">
                            <?php echo $perfil->getPerfilNombre(); ?>
                        </option>
                        <?php endforeach?>
                    </select>
                </div>
                <p class="formularioInputError"> Debe seleccionar una opcion </p> 
             </div>


            <!--Grupo de Mensaje-->
                
            <div class="formMensaje" id="GrupoMensaje">
                    
                <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
            
            </div>

            <!--Grupo de Boton Enviar-->

            <div class="formGrupBtnEnviar">
                <button type="submit" class="formButton" id='Guardar' value='FormInsertUsuario'> Guardar</button>
            </div>

            <div class="formGrupBtnEnviar">
                <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="cancelar">Cancelar</button>
            </div>
            
        </form>
    </main>

    <!--<form action="procesador_insert.php" method=POST class="formulario">
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
                <?php #foreach($listado as $sexo):?>
                <option value="<?php #echo $sexo->getIdSexo(); ?>" class=""><?php #echo $sexo->getDescripcion(); ?></option>
                <?php #endforeach?>
            </select>
        </div>
        <div class="">
            <select name="Perfil" id="" class="">
                <option value="NULL" class="">seleccione perfil</option>
                <?php #foreach($listaPerfil as $perfil):?>
                <option value="<?php #echo $perfil->getIdPerfil(); ?>" class=""><?php #echo $perfil->getPerfilNombre(); ?></option>
                <?php #endforeach?>
            </select>
        </div>
        <br>
        <div class="">
        <input type="submit" class="" name="guardar" value="Guardar">
        <input name="Cancelar" type="submit" value="Cancelar">
        </div>

    </form>-->
    
</body>

<script type="text/javascript" src="../../script/validacionFormInsert.js"></script>

</html>