<?php  
    require_once 'class/Sexo.php';
    require_once 'class/MySql.php';    
    require_once 'class/Persona.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php  
    $sexo=new Sexo();
    $listado=[];
    $listado=$sexo->sexoTodos();

    $persona=new Persona();;
    $sex= $_POST['sexo'];
    echo $sex;
?>

    <form method="POST" action="pruebasexo.php">
        <select name="sexo" id="" class="" >
        <option value="1" class=""><?php echo $listado['0']; ?></option>
        <option value="2" class=""><?php echo $listado['1']; ?></option>
        </select>
        <input type="submit" class="go"> 
    </form>

    






</body>
</html>