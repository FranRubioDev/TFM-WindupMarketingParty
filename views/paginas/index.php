    <div class="contador">
        <p class="contador__texto">Próxima <br> <span class="contador__texto--negrita">MKT_Party</span><br></p>
        <div class="contador__circulo contador__circulo--dias">
            <span class="contador__value">
                <div id="dias" class="contador__numero contador__numero--dias">0</div>
                <span class="contador__texto--dias">Días</span>
            </span>
        </div>
        <div class="contador__circulo contador__circulo--horas">
            <span class="contador__value">
                <div id="horas" class="contador__numero contador__numero--horas">0</div>
                <span class="contador__texto--horas">Horas</span>
            </span>
        </div>
        <div class="contador__circulo contador__circulo--minutos">
            <span class="contador__value">
                <div id="minutos" class="contador__numero contador__numero--minutos">0</div>
                <span class="contador__texto--minutos">Minutos</span>
            </span>
        </div>
        <div class="contador__circulo contador__circulo--segundos">
            <span class="contador__value">
                <div id="segundos" class="contador__numero contador__numero--segundos">0</div>
                <span class="contador__texto--segundos">Segundos</span>
            </span>
        </div>
    </div>
    </section>

    <?php
    include_once __DIR__ . '/evento.php';
    ?>

    <section class="ponentes">
        <h2 class="ponentes__heading">Ponentes</h2>
        <p class="ponentes__descripcion">Expertos en Marketing Digital</p>

        <div class="ponentes__grid">
            <?php foreach ($ponentes as $ponente) { ?>
                <div <?php aos_animacion(); ?> class="ponente">
                        <img class="ponente__imagen" loading="lazy" width="200" height="300" src="img/ponentes/<?php echo $ponente->imagen; ?>.png" alt="Imagen Ponente">

                    <div class="ponente__informacion">
                        <h4 class="ponente__nombre">
                            <?php echo $ponente->nombre . ' ' . $ponente->apellido; ?>
                        </h4>

                        <p class="ponente__ubicacion">
                            <?php echo $ponente->empresa; ?>
                        </p>

                        <nav class="ponente-sociales">
                            <?php
                            $redes =  json_decode($ponente->redes);
                            ?>

                            <?php if (!empty($redes->facebook)) { ?>
                                <a class="ponente-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->facebook; ?>">
                                    <span class="ponente-sociales__ocultar">Facebook</span>
                                </a>
                            <?php } ?>

                            <?php if (!empty($redes->twitter)) { ?>
                                <a class="ponente-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->twitter; ?>">
                                    <span class="ponente-sociales__ocultar">Twitter</span>
                                </a>
                            <?php } ?>

                            <?php if (!empty($redes->youtube)) { ?>
                                <a class="ponente-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->youtube; ?>">
                                    <span class="ponente-sociales__ocultar">YouTube</span>
                                </a>
                            <?php } ?>

                            <?php if (!empty($redes->instagram)) { ?>
                                <a class="ponente-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->instagram; ?>">
                                    <span class="ponente-sociales__ocultar">Instagram</span>
                                </a>
                            <?php } ?>

                            <?php if (!empty($redes->linkedin)) { ?>
                                <a class="ponente-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->linkedin; ?>">
                                    <span class="ponente-sociales__ocultar">LinkedIn</span>
                                </a>
                            <?php } ?>
                        </nav>

                        <ul class="ponente__listado-skills">
                            <?php
                            $tags = explode(',', $ponente->tags);
                            foreach ($tags as $tag) {
                            ?>
                                <li class="ponente__skill"><?php echo $tag; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>


    <?php
    include_once __DIR__ . '/ponencias.php';
    ?>

    <section class="resumen">
        <div class="resumen__grid">
            <div <?php aos_animacion(); ?> class="resumen__bloque">
                <p class="resumen__texto resumen__texto--numero"><?php echo $ponentes_total; ?></p>
                <p class="resumen__texto">Ponentes</p>
            </div>

            <div <?php aos_animacion(); ?> class="resumen__bloque">
                <p class="resumen__texto resumen__texto--numero"><?php echo $conferencias_total; ?></p>
                <p class="resumen__texto">Conferencias</p>
            </div>

            <div <?php aos_animacion(); ?> class="resumen__bloque">
                <p class="resumen__texto resumen__texto--numero"><?php echo $actividades_total; ?></p>
                <p class="resumen__texto">actividades</p>
            </div>

            <div <?php aos_animacion(); ?> class="resumen__bloque">
                <p class="resumen__texto resumen__texto--numero">500</p>
                <p class="resumen__texto">Asistentes</p>
            </div>
        </div>
    </section>




        <section class="entradas">
            <h2 class="entradas__heading">Entradas & Precio</h2>
            <p class="entradas__descripcion">Precios para Windup Marketing Party</p>




<div class="packs__grid">
    <div class="pack">
      <h3 class="pack__nombre">Entrada Gratuita</h3>
      <ul class="pack__lista">
        <li class="pack__elemento">Acceso Online</li>
      </ul>
      <p class="pack__precio">0€</p>
        </div>

    <div class="pack">
      <h3 class="pack__nombre">Entrada Presencial</h3>
      <ul class="pack__lista">
        <li class="pack__elemento">Acceso Presencial</li>
        <li class="pack__elemento">1 Bebida Incluida</li>
        <li class="pack__elemento">Aperitivos variados</li>
        <li class="pack__elemento">Acceso a ponencias</li>
        <li class="pack__elemento">Acceso a concierto</li>
      </ul>
      <p class="pack__precio">15€</p>
    </div>

    


    <div class="pack">
      <h3 class="pack__nombre">Entrada Premium</h3>
      <ul class="pack__lista">
        <li class="pack__elemento">Acceso Presencial</li>
        <li class="pack__elemento">1 Bebida Incluida</li>
        <li class="pack__elemento">Aperitivos variados</li>
        <li class="pack__elemento">Acceso a ponencias</li>
        <li class="pack__elemento">Acceso a concierto</li>
        <li class="pack__elemento">Camiseta Incluida</li>
      </ul>
      <p class="pack__precio">30€</p>
    </div>
</div>


  </div>


            <div class="entrada__enlace-contenedor">
                <a href="/registro" class="entrada__enlace">Ver Packs</a>
            </div>
        </section>

        <section class="mapa">
            <h2 class="mapa__heading">Localización</h2>
            <p class="mapa__descripcion">Para tomar el sol nada mejor que El Balneario de Málaga</p>
            <div class="mapa__iframe">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3198.0495498543337!2d-4.3821544!3d36.7213712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd725814ea284d03%3A0xf980364f5f078cf!2sEl%20Balneario%20-%20Ba%C3%B1os%20del%20Carmen!5e0!3m2!1ses!2ses!4v1717609936753!5m2!1ses!2ses" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>