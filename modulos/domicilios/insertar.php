<?php
    require_once '../../class/MySql.php'; 
    require_once "../../configs.php";  
    require_once "../../class/Perfil.php";
    require_once "../../class/Pais.php";
    
    $mensaje='';
    
    if(isset($_GET['mj'])){
        $mj=$_GET['mj'];
        if ($mj==CORRECT_INSERT_CODE){
            $mensaje=CORRECT_INSERT_MENSAJE;?>
            <div class="mensajes"><?php echo $mensaje;?></div><?php
        }
    };
    $idPersona=$_GET['idPersona'];

    $listaPais=Pais::listado();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <script src ="../../jquery3.6.js"></script>
    <script src ="../../script/comboDomicilio.js"></script>
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Aregar Domicilio</title>
    <title>Insert</title>
</head>

<?php require_once "../../menu.php";?>

<body class="body">
    <h1 class="titulo"> Registro de Domicilio</h1>

    <form action="procesador_insert.php" method=POST class="formUnaColumna" id="formInsert" name="formInsert">
        
        <input type="hidden" name="IdPersona" class="" value="<?php echo $idPersona?>">
        <input type="hidden" name="IdBarrio" class="">
        
        <div class="formGrup" id="GrupoDetalleDomicilio" >
            <label for="GrupoDetalleDomicilio" class="formLabel">Detalle</label>
            <div class="formGrupInput">
                <input type="text" name="DetalleDomicilio" class="formInput" placeholder="Detalle Domicilio">
            </div>
            <p class="formularioInputError"> Debe seleccionar una opcion. </p>
        </div>

        <div class="formGrup" id="GrupocboPais">
            <label for="cboPais" class="formLabel">Pais</label>
            <div class="formGrupInput">
                <Select name="cboPais" id="cboPais" class="formInput" onchange="cargarProvincia()">
                    <option value="0">
                        ->Seleccionar Pais<-
                    </option>
                    <?php foreach($listaPais as $pais):?>
                    <option value="<?php echo $pais->getIdPais()?>">
                        <?php echo $pais->getNombre()?>
                    </option>
                    <?php endforeach?>
                </Select>
            </div>
        <p class="formularioInputError"> Debe seleccionar una opcion.</p> 
        </div>

        <div class="formGrup" id="GrupocboProvincia">
            <label for="cboProvincia" class="formLabel">Provincia</label>
            <div class="formGrupInput">
                <Select name="cboProvincia" id="cboProvincia" class="formInput" onchange="cargarLocalidad()">
                    <option value="0">
                        ->Seleccionar Provincia<-
                    </option>
                </Select>
            </div>
            <p class="formularioInputError"> El Nombre de Barrio no permite simbolos ni numeros.</p> 
        </div>

        <div class="formGrup" id="GrupocboLocalidad">
            <label for="cboLocalidad" class="formLabel">Localidad</label>
            <div class="formGrupInput">
                <Select name="cboLocalidad" id="cboLocalidad" class="formInput" onchange="cargarBarrio()">
                    <option value="0">
                        ->Seleccionar Localidad<-
                    </option>
                </Select>
            </div>
            <p class="formularioInputError">Debe seleccionar una opcion.</p> 
        </div>

<<<<<<< HEAD
        <div class="formGrup" id="GrupocboBarrio">
            <label for="cboBarrio" class="formLabel">Barrio</label>
            <div class="formGrupInput">
                <Select name="cboBarrio" id="cboBarrio" class="formInput" onchange="">
                    <option value="0">
                        ->Seleccionar Barrio<-
                    </option>
                </Select>
            </div>
            <p class="formularioInputError">Debe seleccionar una opcion.</p> 
=======
    <form action="procesador_insert.php" method=POST class="formulario">
        <h1 class="titulo"> Registro de Domicilio</h1>
        <div class=""><input type="hidden" name="IdPersona" class="" value="<?php echo $idPersona?>"></div>
        <div class=""><input type="hidden" name="IdBarrio" class=""></div>
        <div class=""><input type="text" name="Detalle" class="" placeholder="Detalle Domicilio"></div>

        <div>
            <Select>
                <option value="0">->Seleccionar Pais<-</option>
            </Select>
>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780
        </div>
        

        <!--Grupo de Mensaje-->
            
        <div class="formMensaje" id="GrupoMensaje">
                
            <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
        
        </div>

        <!--Grupo de Boton Enviar-->

        <div class="formGrupBtnEnviar">
            <button type="submit" class="formButton" value ="FormInsertDetalleDomicilio" id="Guardar"> Guardar</button>
        </div>

        <div class="formGrupBtnEnviar">
            <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false">Cancelar</button>
        </div>
           
    </form>
    </main>              
    </form>

</body>

<script type="text/javascript" src="../../script/validacionFormInsert.js"></script>

</html>