<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\APIRegalosController;
use Controllers\AuthController;
use Controllers\EventosController;
use Controllers\PaginasController;
use Controllers\RegalosController;
use Controllers\PonentesController;
use Controllers\RegistroController;
use Controllers\DashboardController;
use Controllers\APIEventosController;
use Controllers\APIPonentesController;
use Controllers\RegistradosController;

$router = new Router();


// Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi contraseña
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/reestablecer', [AuthController::class, 'reestablecer']);

// Confirmación de Cuenta
$router->get('/mensaje', [AuthController::class, 'mensaje']);
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);

// Panel de administración
$router->get('/admin/dashboard', [DashboardController::class, 'index']);

// Panel de ponentes
$router->get('/admin/ponentes', [PonentesController::class, 'index']);
$router->get('/admin/ponentes/crear', [PonentesController::class, 'crear']);
$router->post('/admin/ponentes/crear', [PonentesController::class, 'crear']);
$router->get('/admin/ponentes/editar', [PonentesController::class, 'editar']);
$router->post('/admin/ponentes/editar', [PonentesController::class, 'editar']);
$router->post('/admin/ponentes/eliminar', [PonentesController::class, 'eliminar']);

// Panel de Eventos
$router->get('/admin/eventos', [EventosController::class, 'index']);
$router->get('/admin/eventos/crear', [EventosController::class, 'crear']);
$router->post('/admin/eventos/crear', [EventosController::class, 'crear']);
$router->get('/admin/eventos/editar', [EventosController::class, 'editar']);
$router->post('/admin/eventos/editar', [EventosController::class, 'editar']);
$router->post('/admin/eventos/eliminar', [EventosController::class, 'eliminar']);


$router->get('/api/eventos-horario', [APIEventosController::class, 'index']);
$router->get('/api/ponentes', [APIPonentesController::class, 'index']);
$router->get('/api/ponente', [APIPonentesController::class, 'ponente']);
$router->get('/api/regalos', [APIRegalosController::class, 'index']);

// Panel de Registros
$router->get('/admin/registrados', [RegistradosController::class, 'index']);

// Panel de Regalos
$router->get('/admin/regalos', [RegalosController::class, 'index']);

// Registro de Usuario
$router->get('/finalizar-registro', [RegistroController::class, 'crear']);
$router->post('/finalizar-registro/gratis', [RegistroController::class, 'gratis']);
$router->post('/finalizar-registro/pagar', [RegistroController::class, 'pagar']);
$router->get('/finalizar-registro/ponencias', [RegistroController::class, 'ponencias']);
$router->post('/finalizar-registro/ponencias', [RegistroController::class, 'ponencias']);

// Entrada Online
$router->get('/entrada', [RegistroController::class, 'entrada']);


// Web publica
$router->get('/', [PaginasController::class, 'index']);
$router->get('/evento', [PaginasController::class, 'evento']);
$router->get('/packs', [PaginasController::class, 'packs']);
$router->get('/ponencias', [PaginasController::class, 'ponencias']);

$router->get('/404', [PaginasController::class, 'error']);


 $router->comprobarRutas();