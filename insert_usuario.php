<?php  
    require_once 'class/Sexo.php';
    require_once 'class/MySql.php';        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
</head>
<body>

    <form action="procesador_insert.php" method=POST class="">
        <div class=""><input type="text" name="NombreUser" class="" placeholder="nombre usuario"></div>
        <div class=""><input type="text" name="Contrasenia"class="" placeholder="contraseña"></div>
        <div class=""><input type="text" name="NombrePers"class="" placeholder="nombre"></div>
        <div class=""><input type="text" name="Apellido"class="" placeholder="apellido"></div>
        <div class=""><input type="text" name="Dni"class="" placeholder="dni"></div>
        <div class=""><input type="text" name="FechaNac"class="" placeholder="fecha de nacimiento"></div>
        <div class=""><input type="text" name="Estado"class="" placeholder="estado"></div>
        <div class=""><input type="text" name="Sexo"class="" placeholder="sexo"></div>
        <div class=""><input type="submit" class="" name="guardar">
        <div class="">
        
        <?php  $sexo=Sexo::sexoTodos()?>

        <select name="" id="" class="">
        <option value="<?php  $sexo[]?>" class=""></option>
        <option value="" class=""></option>

        <option ' 
             . ( $_GET['sel'] == $options[$i] ? 'selected="selected"' : '' ) . '>' 
             . $options[$i] 
             . '</option>';
        
        
        </select>
        
        </div>
    
    </form>
    
</body>
</html>