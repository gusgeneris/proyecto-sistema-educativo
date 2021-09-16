<?php
    require_once '../../class/Sexo.php';
    require_once '../../class/MySql.php'; 
    require_once "../../configs.php";  
    
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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar nuevo Docente</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body">

<h1 class="titulo"> Registro de Docente</h1>

<main>
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

<<<<<<< HEAD
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
=======
            <div class="formGrup" id="GrupoSexo">
                <label for="Sexo" class="formLabel labelSexo">Sexo</label>
                <p class="MnsjSexo"> *Es obligatorio seleccionar alguna opcion </p>
                <select id="cboSexo" class="cboSexo" required="required" name="cboSexo">
                    <option value="NULL" class="" name="opSexo">-> Seleccione Sexo <-</option>
                    <?php foreach($listado as $sexo):?>
                    <option value="<?php echo $sexo->getIdSexo(); ?>" class=""><?php  echo $sexo->getDescripcion(); ?></option>
                    <?php endforeach?>
                </select>
                
>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780
            </div>

            <!--Grupo de Mensaje-->
                
            <div class="formMensaje" id="GrupoMensaje">
                    
                <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
            
            </div>

            <!--Grupo de Boton Enviar-->

            <div class="formGrupBtnEnviar">
                <button type="submit" class="formButton" value ="FormInsertDocente" id="Guardar"> Guardar</button>
            </div>

            <div class="formGrupBtnEnviar">
                <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="cancelar" onclick="window.history.go(-1); return false;">Cancelar</button>
            </div>
            
        </form>
    </main>

    <!--

    <form action="procesar_insert.php" method=POST class="formulario">
        <h1 class="titulo"> Registro de Docente</h1>
        <br><br>
        <div class=""><input type="text" name="NombrePers" class="" placeholder="Nombre"></div>
        <div class=""><input type="text" name="Apellido" class="" placeholder="Apellido"></div>
        <div class=""><input type="text" name="Dni" class="" placeholder="Dni"></div>
        <div class=""><input type="date" name="FechaNac" class="" placeholder="Fecha de Nacimiento"></div>
        <div class=""><input type="text" name="Nacionalidad" class="" placeholder="Nacionalidad"></div>
        <div class=""><input type="text" name="NumMatricula" class="" placeholder="Numero Matricula"></div>
        <div class="">
        <select name="Sexo" id="" class="">
                <option value="NULL" class="">seleccione sexo</option>
                <?php #foreach($listado as $sexo):?>
                <option value="<?php #echo $sexo->getIdSexo(); ?>" class=""><?php #echo $sexo->getDescripcion(); ?></option>
                <?php #endforeach?>
            </select>
        </div>

        <div class=""><input type="submit" class="" name="guardar" value="Guardar">
        <input name="Cancelar" type="submit" value="Cancelar">

        </div>

    </form>
    -->
</body>

<script type="text/javascript" src="../../script/validacionFormInsert.js"></script>

</html>