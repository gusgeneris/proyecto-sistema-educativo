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

    $per= new Persona();
    
    $per->setSexo(Sexo::sexoTodoPorId(1));
    $per->getSexo();

    highlight_string(var_export($per,true));



?>

<?php foreach ($per as $usuario ):?>
    <table>
        <td class="">asd<?php echo $usuario->getSexo(); ?></td>
    </table>
<?php endforeach ?>



    






</body>
</html>