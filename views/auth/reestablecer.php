<main class="auth">

    <h2 class="auth__heading"> <?php echo $titulo; ?></h2>
    <p class="auth__texto">Introduce tu nueva contraseña</p>


    <?php 
        require_once __DIR__ . '/../templates/alertas.php';
    ?>

    <?php if($token_valido) { ?>
    <form form="POST" class="formulario">
    <div class="formulario__campo">
        <label class="formulario__label" for="password">Nueva contraseña</label>
        <input class="formulario__input" id="password" type="password" placeholder="Introduce tu nueva contraseña" name="password">
    </div>



    <input type="submit" class="formulario__submit" value="Reestablecer contraseña">





    </form>

    <?php } ?>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Tienes una cuenta? Inicia sesión</a>
    </div>

    <div class="acciones">
        <a href="/registro" class="acciones__enlace">Crear nueva cuenta</a>
    </div>

</main>