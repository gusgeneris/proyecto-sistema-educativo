<?php
    require_once "../../class/Clase.php";
    require_once "../../class/LibroTemas.php";

    $clase=Clase::mostrarPorId($idClase);
?>


<div class="container-detalle-libro">
        <div class="titulo">
            <h1>Libro de Temas</h1>
        </div>

        <div class="conteiner-descripcion-clase">
            <div class="subtitulo">
                <h2>Clase Asociada</h2>
            </div>

            <div class="conteiner-btn-modificar">
                <button class="btn-modificar">
                    <a href="../clase/modificar.php?idMateria=<?php echo $idMateria ?>&idClase=<?php echo $idClase ?>">Modificar</a>
                </button>
            </div>

            <div class="conteiner-h3">
                <h3>
                    Numero Clase: <span><?php echo $clase->getNumeroClase() ?></span>
                </h3>
            </div>

            <div class="conteiner-h3">
                <h3>
                    Fecha: <span><?php echo $clase->getFechaClase() ?></span>
                </h3>
            </div>

            <div class="conteiner-h3">           
                <h3>
                    Tipo de Clase: <span><?php echo $clase->getTipoClase() ?></span>
                </h3>
        </div>
</div>