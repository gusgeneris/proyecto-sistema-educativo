<?php
require_once "../../class/MySql.php";
require_once "../../class/Carrera.php";    
require_once "../../configs.php";  
 
require_once "../../mensaje.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/styleFormInsert.css">
    <link rel="stylesheet" href="../../style/stylePasos.css">
    <link href="../../icon/fontawesome/css/all.css" rel="stylesheet"> <!--Estilos para iconos -->
    <link rel="stylesheet" href="../../style/menuVertical.css">
    <script src="../../jquery3.6.js"></script>
    <script type="text/javascript" src="../../script/menu.js" defer> </script>
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
            <form action="procesar_insert.php" method="POST" class="formInsertUnaColumna" id="formInsert" name="formInsert">

                <div class="paso1" id="paso1">
                    <div class="formGrup" id="GrupoNombreCarrera" >
                        <label for="NombreCarrera" class="formLabel">NombreCarrera</label>
                        <div class="formGrupInput">
                            <input type="text" id='NombreCarrera' name="NombreCarrera" class="formInput" placeholder="NombreCarrera">
                        </div>
                        <p class="formularioInputError"> El NombreCarrera no debe contener numeros ni simbolos.</p>

                        <div class="formGrupBtnEnviar">
                        <button type="button" class="formButton" id="Guardar" onclick="mostrarPaso2()"> Siguiente </button>
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
                    <button type="button" class="formButton" id="Guardar" onclick="mostrarPasoFinal(), presentarContenido()" > Siguiente </button>
                    </div>


                    <div class="formGrupBtnEnviar">
                    <button type="button" class="formButton" id="Cancelar" onclick="atras1()" > Atras </button>
                    </div>
                </div>

                <!--Grupo de Mensaje-->
                    
                <div class="formMensaje" id="GrupoMensaje">
                        
                    <p class="MensajeError"> <b>Error</b>: Complete correctamente el Formulario </p>
                
                </div>

                <!--Grupo de Boton Enviar-->
                
                <div class="pasoFinal" id="pasoFinal">
                    <div>
                        <div class="subtitulo"> 
                            <h2>¿Desea ingresar los datos?</h2>
                        </div>
                        <br>
                        <p id=nombre >Nombre de la carrera: </p>
                        <br>
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
    
    <?php require_once "../../footer.php"?>   
    
</body>


<script type="text/javascript" src="../../script/pasosDeUnForm.js"></script>
<script type="text/javascript" src="../../script/validacionFormInsert.js"></script>

</html>