<fieldset class="formulario__fieldset">
    <legend class="formulario__legend"> Información Personal</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre</label>
        <input type="text" class="formulario__input" id="nombre" name="nombre" placeholder="Nombre ponente" value="<?php echo $ponente->nombre ?? '' ?>">
    </div>


    <div class="formulario__campo">
        <label for="apellido" class="formulario__label">Apellido</label>
        <input type="text" class="formulario__input" id="apellido" name="apellido" placeholder="Apellido ponente" value="<?php echo $ponente->apellido ?? '' ?>">
    </div>

    <div class="formulario__campo">
        <label for="ciudad" class="formulario__label">Ciudad</label>
        <input type="text" class="formulario__input" id="ciudad" name="ciudad" placeholder="Ciudad" value="<?php echo $ponente->ciudad ?? '' ?>">
    </div>

    <div class="formulario__campo">
        <label for="empresa" class="formulario__label">Empresa</label>
        <input type="text" class="formulario__input" id="empresa" name="empresa" placeholder="Empresa" value="<?php echo $ponente->empresa ?? '' ?>">
    </div>

    <div class="formulario__campo">
        <label for="imagen" class="formulario__label">Imagen de perfil</label>
        <input type="file" class="formulario__input formulario__input--file" id="imagen" name="imagen">
    </div>

    <?php if(isset($ponente->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen de perfil:</p>
        <div class="formulario__imagen">
            <picture>
            <source srcset="<?php echo $_ENV['HOST'] . '/img/ponentes/' . $ponente ->imagen; ?>.webp" type="image/webp">
            <source srcset="<?php echo $_ENV['HOST'] . '/img/ponentes/' . $ponente ->imagen; ?>.png" type="image/png">
            <img src="<?php echo $_ENV['HOST'] . '/img/ponentes/' . $ponente ->imagen; ?>.png" alt="imagen ponente">
            </picture>
            
        </div>
    <?php } ?>

    <div class="formulario__campo">
        <label for="imagenempresa" class="formulario__label">Logo Empresa</label>
        <input type="file" class="formulario__input formulario__input--file" id="imagenempresa" name="imagenempresa">
    </div>

    <?php if(isset($ponente->imagen_empresa)) { ?>
        <p class="formulario__texto">Logo empresa:</p>
        <div class="formulario__imagen">
        <picture>
            <source srcset="<?php echo $_ENV['HOST'] . '/img/ponentes/' . $ponente ->imagenempresa; ?>.webp" type="image/webp">
            <source srcset="<?php echo $_ENV['HOST'] . '/img/ponentes/' . $ponente ->imagenempresa; ?>.png" type="image/png">
            <img src="<?php echo $_ENV['HOST'] . '/img/ponentes/' . $ponente ->imagenempresa; ?>.png" alt="logo empresa">
            </picture>

        </div>
    <?php } ?>

</fieldset>


<fieldset class="formulario__fieldset">
    <legend class="formulario__legend"> Información extra</legend>

    <div class="formulario__campo">
        <label for="tags_input" class="formulario__label">Área profesional (separadas por comas)</label>
        <input type="text" class="formulario__input" id="tags_input" placeholder="Ej. SEO, Analítica, Diseño UX/UI, Branding, Marketing, Redes Sociales">
        <div id="tags" class="formulario__listado"></div>
        <input type="hidden" name="tags" value="<?php echo $ponente->tags ?? ''; ?>">
    </div>



    </fieldset>


    <fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Redes Sociales</legend>
    
    <div class="formulario__campo">
    <div class="formulario__contenedor-icono">
    <div class="formulario__icono">
        <i class="fa-brands fa-facebook"></i>
    </div>
        <input type="text" class="formulario__input--sociales" name="redes[facebook]" placeholder="Facebook" value="<?php echo $redes->facebook ?? '' ?>">
    </div>
    </div>

    <div class="formulario__campo">
    <div class="formulario__contenedor-icono">
    <div class="formulario__icono">
        <i class="fa-brands fa-twitter"></i>
    </div>
        <input type="text" class="formulario__input--sociales" name="redes[twitter]" placeholder="X / Twitter" value="<?php echo $redes->twitter ?? '' ?>">
    </div>
    </div>

    <div class="formulario__campo">
    <div class="formulario__contenedor-icono">
    <div class="formulario__icono">
        <i class="fa-brands fa-youtube"></i>
    </div>
        <input type="text" class="formulario__input--sociales" name="redes[youtube]" placeholder="Youtube" value="<?php echo $redes->youtube ?? '' ?>">
    </div>
    </div>

    <div class="formulario__campo">
    <div class="formulario__contenedor-icono">
    <div class="formulario__icono">
        <i class="fa-brands fa-instagram"></i>
    </div>
        <input type="text" class="formulario__input--sociales" name="redes[instagram]" placeholder="Instagram" value="<?php echo $redes->instagram ?? '' ?>">
    </div>
    </div>

    <div class="formulario__campo">
    <div class="formulario__contenedor-icono">
    <div class="formulario__icono">
        <i class="fa-brands fa-linkedin"></i>
    </div>
        <input type="text" class="formulario__input--sociales" name="redes[linkedin]" placeholder="LinkedIn" value="<?php echo $redes->linkedin ?? '' ?>">
    </div>
    </div>

    <div class="formulario__campo">
    <div class="formulario__contenedor-icono">
    <div class="formulario__icono">
        <i class="fa-solid fa-link"></i>
    </div>
        <input type="text" class="formulario__input--sociales" name="redes[web]" placeholder="Web" value="<?php echo $redes->web ?? '' ?>">
    </div>
    </div>


    </fieldset>