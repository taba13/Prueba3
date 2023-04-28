<?php

// Página principal
function index() {
  echo "¡Hola Mundo!";
}

// Manejador de rutas
$routes = array(
  '/' => 'index'
);

// Enrutador
function router($routes) {
  $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  $route = rtrim($path, '/');
  
  if (array_key_exists($route, $routes)) {
    $handler = $routes[$route];
    call_user_func($handler);
  } else {
    http_response_code(404);
    echo "Página no encontrada";
  }
}

// Ejecutar el enrutador
router($routes);

?>
