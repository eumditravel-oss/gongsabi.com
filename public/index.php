<?php

declare(strict_types=1);

use App\Core\Config;
use App\Core\Request;
use App\Core\Response;
use App\Core\Router;

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/app/helpers.php';

spl_autoload_register(static function (string $class): void {
    $prefix = 'App\\';
    if (strncmp($class, $prefix, strlen($prefix)) !== 0) {
        return;
    }

    $relative = substr($class, strlen($prefix));
    $path = BASE_PATH . '/app/' . str_replace('\\', '/', $relative) . '.php';
    if (is_file($path)) {
        require $path;
    }
});

Config::load(BASE_PATH . '/.env');

$secure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
session_name(Config::get('SESSION_NAME', 'gongsabi_session'));
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => '',
    'secure' => $secure,
    'httponly' => true,
    'samesite' => 'Lax',
]);
session_start();

$router = new Router();
$routes = require BASE_PATH . '/config/routes.php';
foreach ($routes as $route) {
    [$method, $path, $handler] = $route;
    $router->add($method, $path, $handler);
}

try {
    $request = Request::fromGlobals();
    $response = $router->dispatch($request);
} catch (Throwable $e) {
    if (Config::bool('APP_DEBUG', false)) {
        $response = new Response('<pre>' . e((string) $e) . '</pre>', 500);
    } else {
        $response = new Response('서버 오류가 발생했습니다.', 500);
    }
}

$response->send();
