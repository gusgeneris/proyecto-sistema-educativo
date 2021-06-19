<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styleInsert.css">
    <link rel="stylesheet" href="style/menu.css">
    <link rel="icon" type="image/jpg" href="image/logo.png"><title>Inicio</title>
</head>
<body class="body-inicio">
<?php require_once "menu.php";?>
<br><br><br><br><br>

<?php #highlight_string(var_export($usuario,true));?>

<h1 class="titulo">Bienvenido <?php echo $usuario;?></h1>

</body>
</html>