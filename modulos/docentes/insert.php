<?php
    require_once '../../class/Sexo.php';
    require_once '../../class/MySql.php'; 
    require_once "../../configs.php";  
?>
<?php  
    
    $listado=Sexo::sexoTodos();

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../style/styleFormInsert.css">
        <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
        <link rel="stylesheet" href="../../style/menuVertical.css">
        <script src="../../jquery3.6.js"></script>
        <script type="text/javascript" src="../../script/menu.js" defer> </script>
        <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar nuevo Docente</title>
    </head>

    <?php require_once "../../menu.php";?>

    <body class="body">

    <div class="titulo"> 
        <h1> Registro de Docente</h1>
    </div>

    <div class="main">
        <form action="procesar_insert.php" method=POST class="formInsert" id="formInsert" name="formInsert">
                
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
                            <input type="date" id='FechaNacimiento' name="Fecha" class="formInput" placeholder="Fecha">
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

                <!--Grupo de Numero Matricula-->
                    
                <div class="formGrup" id="GrupoNumeroMatricula">
                        <label for="NumeroMatricula" class="formLabel">Numero Matricula</label>
                        <div class="formGrupInput">
                            <input type="text" id='NumeroMatricula' name="NumeroMatricula" class="formInput" placeholder="NumeroMatricula">
                            <i ><img class="formValidacionEstado"  src="" id="formValidacionEst"></i>
                        </div>
                        <p class="formularioInputError"> El NumeroMatricula no es necesariamente obligatoria.</p>
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

                <!--Grupo de NombreUsuario-->
                
                <div class="formGrup" id="GrupoNombreUsuario" >
                    <label for="NombreUsuario" class="formLabel">Nombre Usuario</label>
                    <div class="formGrupInput">
                        <input type="text" id='NombreUsuario' name="NombreUsuario" class="formInput" placeholder="NombreUsuario">
                        
                        <i ><img class="formValidacionEstado"  src="" id="formValidacionEst"></i>
                    </div>
                    <p class="formularioInputError"> El nombre no debe contener numeros ni simbolos.</p>
                </div>
                <!--Grupo de Contrase??a-->
                
                <div class="formGrup" id="GrupoContrasenia" >
                    <label for="Contrasenia" class="formLabel">Contrasenia</label>
                    <div class="formGrupInput">
                        <input type="text" id='Contrasenia' name="Contrasenia" class="formInput" placeholder="Contrase??a">
            
                        <i ><img class="formValidacionEstado"  src="" id="formValidacionEst"></i>
                    </div>
                    <p class="formularioInputError"> El Contrasenia no debe contener numeros ni simbolos.</p>
                </div>

                <!--Grupo de Contrasenia2-->
                
                <div class="formGrup" id="GrupoContrasenia2" >
                    <label for="Contrasenia2" class="formLabel">Repetir Contrase??a</label>
                    <div class="formGrupInput">
                        <input type="text" id='Contrasenia2' name="Contrasenia2" class="formInput" placeholder="Contrase??a">
                        
                        <i ><img class="formValidacionEstado"  src="" id="formValidacionEst"></i>
                    </div>
                    <p class="formularioInputError"> Las Contrase??as deben coincidir.</p>
                </div>

                <input type="hidden" value="3" name="PerfilUsuario">

                <!--Grupo de Mensaje-->
                    
                <div class="formMensaje" id="GrupoMensaje">
                        
                    <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
                
                </div>

                <!--Grupo de Boton Enviar-->

                <div class="formGrupBtnEnviar">
                    <button type="submit" class="formButton" value ="FormInsertDocente" id="Guardar"> Guardar</button>
               
                    <button name="Cancelar" class="formButton" type="button" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false;">Cancelar</button>
                </div>
                
            </form>
        </div>

        <?php require_once "../../footer.php"?>                        
    </body>

    <script type="text/javascript" src="../../script/validacionFormInsert.js"></script>

</html>