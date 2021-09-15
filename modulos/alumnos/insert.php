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
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar Alumno</title>
    <!--<script type="text/javascript" src="../../script/validacion.js"></script>-->
    
    
    <title>Insert</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body">

<div id ="error"></div>
    
<h1 class="titulo"> Registro de Alumnos</h1>

<main>
<form action="procesador_insert_alumno.php" method=POST class="formInsert" id="formInsert" name="formInsert">
        
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

        <!--Grupo de NumeroLegajo-->
            
        <div class="formGrup" id="GrupoNumeroLegajo">
                <label for="NumeroLegajo" class="formLabel">NumeroLegajo</label>
                <div class="formGrupInput">
                    <input type="text" id='NumeroLegajo' name="NumeroLegajo" class="formInput" placeholder="NumeroLegajo">
                    <i ><img class="formValidacionEstado"  src="" id="formValidacionEst"></i>
                </div>
                <p class="formularioInputError"> El NumeroLegajo no es necesariamente obligatoria.</p>
        </div>

        <!--Grupo de Sexo-->

        <div class="formGrup" id="GrupoSexo">
            <label for="Sexo" class="formLabel labelSexo">Sexo</label>
            <p class="MnsjSexo"> *Es obligatorio seleccionar alguna opcion </p>
            <select id="cboSexo" class="cboSexo" required="required" name="cboSexo">
                <option value="NULL" class="" name="opSexo">-> Seleccione Sexo <-</option>
                <?php foreach($listado as $sexo):?>
                <option value="<?php echo $sexo->getIdSexo(); ?>" class=""><?php  echo $sexo->getDescripcion(); ?></option>
                <?php endforeach?>
            </select>
            
        </div>

        <!--Grupo de Mensaje-->
            
        <div class="formMensaje" id="GrupoMensaje">
                
            <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
        
        </div>

        <!--Grupo de Boton Enviar-->

        <div class="formGrupBtnEnviar">
            <button type="submit" class="formButton" value ="FormInsertAlumnos" id="Guardar"> Guardar</button>
        </div>

        <div class="formGrupBtnEnviar">
            <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false">Cancelar</button>
        </div>
           
    </form>
    </main>


    <!--<form action="procesador_insert_alumno.php" method=POST class="formulario" id="formInsert" onsubmit="return validarInsertForm();">
        <h1 class="titulo"> Registro de Alumnos</h1>
        <div class=""><input type="text" name="txtNombre" class="" placeholder="Nombre" id="txtNombre" required="required"></div>
        <div class=""><input type="text" name="txtApellido" class="" placeholder="Apellido" id="txtApellido" required="required"></div>
        <div class=""><input type="text" name="txtDni" class="" placeholder="Dni"></div>
        <div class=""><input type="date" name="dateFechaNac" class="" placeholder="Fecha de Nacimiento"></div>
        <div class=""><input type="text" name="txtNacionalidad" class="" placeholder="Nacionalidad"></div>
        <div class=""><input type="text" name="txtNumLegajo" class="" placeholder="Numero Legajo"></div>
        <div class="">
            <select name="cboSexo" id="cboSexo" class="" required="required">
                <option value="NULL" class="">seleccione sexo</option>
                <?php #foreach($listado as $sexo):?>
                <option value="<?php # echo $sexo->getIdSexo(); ?>" class=""><?php # echo $sexo->getDescripcion(); ?></option>
                <?php #endforeach?>
            </select>
        </div>
        <div class=""><input type="submit" class="" name="guardar" value="Guardar">
            <input name="Cancelar" type="submit" value="Cancelar">
        </div>               
    </form>-->

</body>

<script type="text/javascript" src="../../script/validacionFormInsert.js"></script>

</html>