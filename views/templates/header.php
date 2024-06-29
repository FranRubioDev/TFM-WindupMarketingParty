<header class="header">

    <video id="backgroundvideo" autoplay loop muted poster="">
        <source src="/build/video/Windup-MKT-Party.mp4" type="video/mp4">
    </video>
    <div class="header__fondo">
        <div class="header__contenedor">

            <nav class="header__navegacion">
                <?php if(is_auth()) {  ?>

                <a class="header__enlace" href="<?php echo is_admin() ? '/admin/dashboard' : '/finalizar-registro'; ?>">Cuenta</a>
                <form method="POST" action="/logout" class="header__form">
                    <input type="submit" value="Cerrar Sesión" class="header__submit">
                </form>

                <?php   } else { ?>

                <a class="header__enlace" href="/registro">Registro</a>
                <a class="header__enlace" href="/login">Iniciar Sesión</a>

                <?php  } ?>
            </nav>

            <div class="header__contenido">
            
            <div></div>
            <p class="header__texto"> <i class="fa-regular fa-calendar"></i>  5 Junio <i class="fa-solid fa-location-dot"></i> <span class="header__logo--delgada">  Baños del Cármen, MÁLAGA</span></p>
            
                <a href="/">
                    <h1 class="header__logo">
                        <span class="header__logo--delgada">Windup </span>Marketing <br>  Party <span class="header__logo--delgada">2025</span>
                    </h1>
                </a>
                <div>
                <a href="/registro" class="header__boton">¿Quieres tu entrada?</a>
                <a target="_blank" href="https://www.youtube.com/watch?v=MQ-ivrFiuoE" class="header__boton--alterno"><i class="fa-solid fa-play"></i>Ver video</a>
                </div>
            </div>
        </div>
    </div>



</header>
