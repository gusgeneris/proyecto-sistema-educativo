<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styleInsert.css">
    <link rel="stylesheet" href="style/menu.css">
    <link rel="stylesheet" href="style/style.css">
    <script src="jquery3.6.js"></script>
    <link rel="icon" type="image/jpg" href="image/logo.png"><title>Inicio</title>
</head>
<body class="body-inicio">

<?php require_once "menu.php";?>
<?php #highlight_string(var_export($usuario,true));?>

<div class="titulo-pagina-inicio"> 
    <h1 class="titulo">Bienvenido <?php echo $usuario;?></h1>
</div>

</body>

<footer >
    <div class="footer">
        <p class="diseñadorPor">Diseñado por Sandoval Gustavo 2021</p>
    </div>
</footer>

<script type="text/javascript" src="script/menu.js"> </script>
</html>