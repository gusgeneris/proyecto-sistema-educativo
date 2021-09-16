<?php

require_once "../../class/Domicilio.php";
require_once "../../class/Pais.php";
require_once "../../class/Provincia.php";
require_once "../../class/Persona.php";
require_once "../../class/Barrio.php";
require_once "../../class/Localidad.php";
require_once "../../class/Sexo.php";
require_once "../../class/Perfil.php";
require_once "../../configs.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];    
}

$idPersona=$_GET['idPersona'];
$idDomicilio = $_GET['idDomicilio'];
$idBarrio = $_GET['idBarrio'];
$domicilio= Domicilio::obtenerPorId($idDomicilio);

$barrio= Barrio::obtenerPorIdBarrio($idBarrio);
$idLocalidad=$barrio->getIdLocalidad();
$localidad=Localidad::obtenerPorIdLocalidad($idLocalidad);
$idProvincia=$localidad->getIdProvincia();
$provicnia=Provincia::obtenerPorIdProvincia($idProvincia);
$idPais=$provicnia->getIdPais();
$pais=Pais::obtenerPorIdPais($idPais);



$listadoPaises=Pais::listado();
$listadoProvincias=Provincia::listadoPorPais($idPais);
$listadoLocalidades= Localidad::listadoPorProvincia($idProvincia);
$listadoBarrios= Barrio::listadoPorLocalidad($idLocalidad)




?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
        <link rel="stylesheet" href="../../style/styleFormInsert.css">
        <link rel="stylesheet" href="/proyecto-modulos/style/menu.css">
        <script src ="../../jquery3.6.js"></script>
        <script src ="../../script/comboDomicilio.js"></script>
=======
        <link rel="stylesheet" href="/proyecto-modulos/style/styleInsert.css">
        <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780
        <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Modificar domicilio</title>
    </head>
    <?php require_once "../../menu.php";?>

    <body class="modif-user">
<<<<<<< HEAD
        <h1 class="titulo">Ingrese los nuevos datos</h1>
        
        <form action="procesar_actualizar.php" method="POST"class="formModificar" id="formModificar" name="formModificar">
            

            <input name="IdPersona" type="hidden" class="" value="<?php echo $idPersona; ?>">
                
            <input name="IdDomicilio" type="hidden" class="" value="<?php echo $domicilio->getIdDomicilio(); ?>">

            <div class="formGrup" id="GrupoDetalleDomicilio" >
                <label for="GrupoDetalleDomicilio" class="formLabel">Detalle de Domicilio</label>
                <div class="formGrupInput">   
                    <input name="Detalle" type="text" class="formInput" value="<?php echo $domicilio->getDetalle(); ?>">
                    </div>
                <p class="formularioInputError"> Debe seleccionar una opcion. </p>
            </div>


            <div class="formGrup" id="GrupocboPais">
                <label for="cboPais" class="formLabel">Pais</label>
                <div class="formGrupInput">
                    <Select name="cboPais" id="cboPais" class="formInput" onchange="cargarProvincia()">
                    <?php foreach($listadoPaises as $pais):?>
                        <option <?php if($pais->getIdPais()==$idPais){echo "SELECTED";}?> value="<?php echo $pais->getIdPais()?>">
                            <?php echo $pais->getNombre()?>
                        </option>
                    <?php endforeach?>
                    </Select>
                </div>
                <p class="formularioInputError">Debe seleccionar una opcion.</p> 
            </div>

            <div class="formGrup" id="GrupocboProvincia">
                <label for="cboProvincia" class="formLabel">Provincia</label>
                <div class="formGrupInput">
                    <Select name="cboProvincia" id="cboProvincia" class="formInput" onchange="cargarLocalidad()">
                    <?php foreach($listadoProvincias as $provincia):?>
                            <option <?php if($provincia->getIdProvincia()==$idProvincia){echo "SELECTED";}?> value="<?php echo $provincia->getIdProvincia()?>">
                                <?php echo $provincia->getNombre()?>
                            </option>
                    <?php endforeach?>
                    </Select>
                </div>
                <p class="formularioInputError"> El Nombre de Barrio no permite simbolos ni numeros.</p> 
            </div>

            <div class="formGrup" id="GrupocboLocalidad">
                <label for="cboLocalidad" class="formLabel">Localidad</label>
                <div class="formGrupInput">
                    <Select name="cboLocalidad" id="cboLocalidad" class="formInput" onchange="cargarBarrio()">
                        <?php foreach($listadoLocalidades as $localidad):?>
                            <option <?php if($localidad->getIdLocalidad()==$idLocalidad){echo "SELECTED";}?> value="<?php echo $localidad->getIdLocalidad()?>">
                                <?php echo $localidad->getNombre()?>
                            </option>
                        <?php endforeach?>
                    </Select>
                </div>
                <p class="formularioInputError">Debe seleccionar una opcion.</p> 
            </div>

            <div class="formGrup" id="GrupocboBarrio">
                <label for="cboBarrio" class="formLabel">Barrio</label>
                <div class="formGrupInput">
                    <Select name="cboBarrio" id="cboBarrio" class="formInput" onchange="">
                        <?php foreach($listadoBarrios as $barrio):?>
                            <option <?php if($barrio->getIdLocalidad()==$idBarrio){echo "SELECTED";}?> value="<?php echo $barrio->getIdBarrio()?>">
                                <?php echo $barrio->getNombre()?>
                            </option>
                        <?php endforeach?>
                    </Select>
                </div>
                <p class="formularioInputError">Debe seleccionar una opcion.</p> 
            </div>

            <!--Grupo de Mensaje-->
            
            <div class="formMensaje" id="GrupoMensaje">
                
                <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
            
            </div>

            <div> 
            <div class="formGrupBtnEnviar">
                <button type="submit" class="formButton" value ="FormInsertdocentes" id="Guardar"> Guardar</button>
            </div>

            <div class="formGrupBtnEnviar">
                <button name="Cancelar" class="formButton" type="submit" value="Cancelar" id="Cancelar" onclick="window.history.go(-1); return false" >Cancelar</button>
            </div>
        </form>


        </body>

<script type="text/javascript" src="../../script/validacionFormModificar.js"></script>

</html>
=======
        
        <form action="procesar_actualizar.php" method="POST"class="formulario">
                <h1 class="titulo">Ingrese los nuevos datos</h1>

                <div class=""> 
                    <input name="IdPersona" type="hidden" class="" value="<?php echo $idPersona; ?>">
                </div>
                <div class=""> 
                    <input name="IdDomicilio" type="hidden" class="" value="<?php echo $domicilio->getIdDomicilio(); ?>">
                </div>
                <div class=""> 
                    <input name="Detalle" type="text" class="" value="<?php echo $domicilio->getDetalle(); ?>">
                </div>
                <div> 
                    <input name="Guardar" type="submit" value="Actualizar" >
                    <input name="Cancelar" type="submit" value="Cancelar">
                </div>
        </form>


    </body>

</html>
>>>>>>> 9dbcb0807d65d560263e4aeb0ec99bfaaca0b780
