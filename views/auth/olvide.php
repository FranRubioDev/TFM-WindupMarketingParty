<main class="auth">

    <h2 class="auth__heading"> <?php echo $titulo; ?></h2>
    <p class="auth__texto">Recuperar acceso</p>

    <?php 
        require_once __DIR__ . '/../templates/alertas.php';
    ?>

    <form form="POST" class="formulario" action="/olvide">
    <div class="formulario__campo">
        <label class="formulario__label" for="email">Email</label>
        <input class="formulario__input" id="email" type="email" placeholder="Email" name="email">
    </div>

    <input type="submit" class="formulario__submit" value="Reestablecer contraseña">

    </form>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Tienes una cuenta? Inicia sesión</a>
    </div>

    <div class="acciones">
        <a href="/registro" class="acciones__enlace">Crear nueva cuenta</a>
    </div>

</main>