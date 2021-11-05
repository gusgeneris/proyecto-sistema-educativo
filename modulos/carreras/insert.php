<?php
require_once "../../class/MySql.php";
require_once "../../class/Carrera.php";    
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link rel="stylesheet" href="../../style/stylePasos.css">
    <link rel="stylesheet" href="/proyecto-modulos/style/menu.css" class="">
    <link rel="icon" type="image/jpg" href="../../image/logo.png"><title>Agregar Carrera</title>
    <title>Agregar nuevo</title>
</head>

<?php require_once "../../menu.php";?>

<body>
    <h1 class="titulo"> Registro de Carrera</h1>

    <div id="containerForm">
        <div class="main">
        <div id="pasos"> 
            <h2 class="cabeceraPaso1" id="cabeceraPaso1">Paso1</h2>
            <h2 id="cabeceraPaso2">Paso2</h2>
            <h2 id="cabeceraPaso3">Paso3</h2>
        </div>
        <form action="procesar_insert.php" method="POST" class="formInsert2Columnas" id="formInsert" name="formInsert">

            <div class="paso1" id="paso1">
                <div class="formGrup" id="GrupoNombreCarrera" >
                    <label for="NombreCarrera" class="formLabel">NombreCarrera</label>
                    <div class="formGrupInput">
                        <input type="text" id='NombreCarrera' name="NombreCarrera" class="formInput" placeholder="NombreCarrera">
                    </div>
                    <p class="formularioInputError"> El NombreCarrera no debe contener numeros ni simbolos.</p>

                    <div class="formGrupBtnEnviar">
                    <button type="button" class="formButton" onclick="mostrarPaso2()"> Siguiente </button>
                    </div>

                </div>
            </div>

            <div class="paso2" id="paso2">
                <div class="formGrup" id="GrupoAnios" >
                    <label for="Anios" class="formLabel">Años de duracion</label>
                    <div class="formGrupInput">
                        <input type="text" id='Anios' name="Anios" class="formInput" placeholder="Duracion en Años">
                    </div>
                    <p class="formularioInputError"> Debe ingresar correctamente los datos solicitados.</p>
                </div>
                <div class="formGrupBtnEnviar">
                <button type="button" class="formButton" onclick="mostrarPasoFinal(), presentarContenido()" > Siguiente </button>
                </div>


                <div class="formGrupBtnEnviar">
                <button type="button" class="formButton" onclick="atras1()" > Atras </button>
                </div>
            </div>

            <!--Grupo de Mensaje-->
                
            <div class="formMensaje" id="GrupoMensaje">
                    
                <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
            
            </div>

            <!--Grupo de Boton Enviar-->
            
            <div class="pasoFinal" id="pasoFinal">
                <div>
                    <h2>¿Desea ingresar los datos?</h2>

                    <p id=nombre >Nombre de la carrera: </p>
                    <p id=anios >Años de duracion: </p>
            
                </div>

                <div class="formGrupBtnEnviar">
                    <button type="submit" class="formButton" value ="FormInsertCarrera" id="Guardar"> Guardar</button>
                </div>
                
                <div class="formGrupBtnEnviar">
                    <button type="button" class="formButton" id="Cancelar" onclick="atras2()" > Atras </button>
                </div>
                
            </div>
        </form>
        </div>
    </div>
    
</body>


<script type="text/javascript" src="../../script/pasosDeUnForm.js"></script>
<script type="text/javascript" src="../../script/validacionFormInsert.js"></script>

</html>