<footer>
    <div class="conteinerFooter">
        <div class="logoFooter">
            <img src="/proyecto-modulos/image/logoo_frase.png" alt="">
        </div>
        <div class="modulosFooter">
            <div class="tituloModulosFooter"> Modulos</div>
            
            <ul>         
                <?php foreach($listadoModulos as $modulos): $nombreModulo=$modulos->getNombre()?>
        
                    <li>
                        <a href="/proyecto-modulos/modulos/<?php echo $modulos->getDirectorio();?>/listado.php">
                                    
                            <?php echo ucwords($nombreModulo);?>
                    </a>
                    </li>                        
                        <?php endforeach; ?>
                    <li><a href="/proyecto-modulos/cerrar_sesion.php">Cerrar Sesion</a></li>
                        
                    </ul>
        </div>
        <div class="contactosFooter">
            <div class="tituloModulosFooter"> Contacto</div>
            <ul>
                <li>
                    <a href="www.instagram.com"><i class="iconFooter fab fa-instagram-square"></i></a>
                </li>
                <li>
                    <a href="www.facebook.com"><i class="iconFooter fab fa-facebook-square"></i></a>
                </li><li>
                    <a href="www.twitter.com"><i class="iconFooter fab fa-twitter-square"></i></a>
                </li>
            </ul>
        </div>
        <div class="firmaFooter">
            <p>Desarrollado por Gustavo Sandoval 2021</p>
        </div>
    </div>
</footer>