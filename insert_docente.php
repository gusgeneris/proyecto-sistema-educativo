<?php
    require_once 'class/Sexo.php';
    require_once 'class/MySql.php'; 
    require_once "configs.php";  

    session_start();

    if(isset($_SESSION['usuario'])){
        $usuario=$_SESSION['usuario'];
    }
    else{header("Location:test_login.php?error=".INCORRECT_SESSION_CODE);
    exit;}
    
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
    $sexo=new Sexo();
    $listado=[];
    $listado=$sexo->sexoTodos();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleInsert.css">
    <title>Insert</title>
</head>
<header class="">
    <nav>
        <a><img class="logob" src="image/logo.png" href="inicio.php"></a>
    
        <a class="frasecabeza" href="inicio.php">S.I.G.E</a>
    </nav>
</header>

<body class="body">

    <form action="procesador_insert_docente.php" method=POST class="formulario">
        <h1 class="titulo"> Registro de Docente</h1>
        <div class=""><input type="text" name="NombrePers" class="" placeholder="Nombre"></div>
        <div class=""><input type="text" name="Apellido" class="" placeholder="Apellido"></div>
        <div class=""><input type="text" name="Dni" class="" placeholder="Dni"></div>
        <div class=""><input type="date" name="FechaNac" class="" placeholder="Fecha de Nacimiento"></div>
        <div class=""><input type="text" name="Nacionalidad" class="" placeholder="Nacionalidad"></div>
        <div class=""><input type="text" name="NumMatricula" class="" placeholder="Numero Matricula"></div>
        <div class="">
            <select name="Sexo" id="" class="">
                <option value="0" class="">seleccione sexo</option>
                <option value="1" class=""><?php echo $listado['0']; ?></option>
                <option value="2" class=""><?php echo $listado['1']; ?></option>
            </select>
        </div>
        <div class=""><input type="submit" class="" name="guardar">

        </div>

    </form>

</body>

</html>