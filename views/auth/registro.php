<main class="auth">

    <h2 class="auth__heading"> <?php echo $titulo; ?></h2>
    <p class="auth__texto">Registrate en Windup Marketing Party</p>

    <?php
        if ($usuario->confirmado) {
            header("Location: /finalizar-registro");
            exit;
        }
    ?>

    <?php
        require_once __DIR__ . '/../templates/alertas.php';
    ?>

    <form method="POST" action="/registro" class="formulario">

    <div class="formulario__campo">
        <label class="formulario__label" for="nombre">Nombre</label>
        <input class="formulario__input" id="nombre" type="text" name="nombre" placeholder="nombre" value="<?php echo $usuario->nombre; ?>">
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="apellido">Apellido</label>
        <input class="formulario__input" id="apellido" type="text" name="apellido" placeholder="apellido" value="<?php echo $usuario->apellido; ?>">
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="email">Email</label>
        <input class="formulario__input" id="email" type="email" name="email" placeholder="Email" value="<?php echo $usuario->email; ?>">
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="password">Contraseña</label>
        <input class="formulario__input" id="password" type="password" name="password" placeholder="Contraseña">
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="password2">Repetir contraseña</label>
        <input class="formulario__input" id="password2" type="password" name="password2" placeholder="Repetir contraseña">
    </div>

    <input type="submit" class="formulario__submit" value="Crear cuenta">





    </form>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Tienes una cuenta? Inicia sesión</a>
    </div>

    <div class="acciones">
        <a href="/olvide" class="acciones__enlace">¿Has olvidado tu contraseña?</a>
    </div>

</main>