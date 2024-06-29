<main class="pagina">
    <h2 class="pagina__heading"><?php echo $titulo; ?></h2>
    <p class="pagina__descripcion">Aquí está tu entrada, no la pierdas.</p>

    <div class="entrada-virtual">

        <div class="entrada entrada--<?php echo strtolower($registro->pack->nombre); ?> entrada--acceso">
            <div class="entrada__contenido">
                <h4 class="entrada__logo">Windup Marketing Party</h4>
                <p class="entrada__plan"><?php echo $registro->pack->nombre; ?></p>
                <p class="entrada__nombre"><?php echo $registro->usuario->nombre . " " . $registro->usuario->apellido; ?></p>

                <?php if ($registro->pack->nombre == 'Gratuita'): ?>
                  <a href="https://www.twitch.tv/windupmarketing" class="entrada__boton">Ver online en Twitch</a>
                <?php endif; ?>

                
            </div>

            <p class="entrada__codigo"><?php echo '#' . $registro->token; ?></p>
        </div>
    </div>
</main>

