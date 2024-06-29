<main class="agenda">
<h2 class="agenda__heading"><?php echo $titulo; ?></h2>
    <p class="agenda__descripcion">Talleres y ponencias de los mejores expertos en marketing digital</p>

    <div class="eventos">
        <h3 class="eventos__heading">Ponencias</h3>
        <p class="eventos__fecha">6 de Junio</p>

        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach($eventos['conferencias_v'] as $evento ) { ?>
                    <?php include __DIR__ . '../../templates/evento.php'; ?>
                <?php } ?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>


        <p class="eventos__fecha">7 de Junio</p>

        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach($eventos['conferencias_s'] as $evento ) { ?>
                    <?php include __DIR__ . '../../templates/evento.php'; ?>
                <?php } ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

    <div class="eventos eventos--actividades">
        <h3 class="eventos__heading">Actividades</h3>
        <p class="eventos__fecha">6 de Junio</p>

        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach($eventos['actividades_v'] as $evento ) { ?>
                    <?php include __DIR__ . '../../templates/evento.php'; ?>
                <?php } ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <p class="eventos__fecha">7 de Junio</p>

        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach($eventos['actividades_s'] as $evento ) { ?>
                    <?php include __DIR__ . '../../templates/evento.php'; ?>
                <?php } ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

    </div>



</main>
