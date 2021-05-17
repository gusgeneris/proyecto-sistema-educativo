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
    <title>Document</title>
</head>
<body>
<?php  
    $sexo=new Sexo();
    $listado=$sexo->sexoTodos();
    $r=$sexo->get_idSexo();
    highlight_string(var_export($listado)) ;


    /*for($i=0;$i<count($listado);$i++){
            print_r( $listado[$i]);
    ?>
    <br class="">
    <?php }*/
    ?>







</body>
</html>