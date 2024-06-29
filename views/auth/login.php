<main class="auth">

    <h2 class="auth__heading"> <?php echo $titulo; ?></h2>
    <p class="auth__texto">Inicia sesión en Windup Marketing Party</p>


<?php 
    require_once __DIR__ . '/../templates/alertas.php'
?>

    <form method="POST" class="formulario" action="/login">
    <div class="formulario__campo">
        <label class="formulario__label" for="email">Email</label>
        <input class="formulario__input" name="email" id="email" type="email" placeholder="Email">
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="password">Contraseña</label>
        <input class="formulario__input" id="password" name="password" type="password" placeholder="Contraseña">
    </div>

    <input type="submit" class="formulario__submit" value="Iniciar sesión">





    </form>

    <div class="acciones">
        <a href="/registro" class="acciones__enlace">Crear nueva cuenta</a>
    </div>

    <div class="acciones">
        <a href="/olvide" class="acciones__enlace">¿Has olvidado tu contraseña?</a>
    </div>

</main>