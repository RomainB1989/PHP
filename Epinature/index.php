<?php
session_start();
require_once __DIR__ . '/utils/utils.php';

// Get the requested URL
$request_uri = $_SERVER['REQUEST_URI'];
$base_path = dirname($_SERVER['SCRIPT_NAME']);
$route = str_replace($base_path, '', $request_uri);
$route = strtok($route, '?');
$route = trim($route, '/');


// Default route
if (empty($route)) {
    $route = 'accueil';
}

// Define routes and their corresponding controllers
$routes = [
    'accueil' => 'controllers/controller_accueil.php',
    'account' => 'controllers/controller_account.php',
    'account/infos' => 'controllers/controller_account_infos.php',
    'connexion' => 'controllers/controller_connexion.php',
    'deconnexion' => 'controllers/controller_deconnexion.php',
    'contact' => 'controllers/controller_contact.php',
    'cguv' => 'controllers/controller_cguv.php',
    'mentions-legales' => 'controllers/controller_mentions-legales.php',
    'ou-nous-trouver' => 'controllers/controller_ou-nous-trouver.php',
    'partenaires' => 'controllers/controller_partenaires.php',
    'presentation' => 'controllers/controller_presentation.php',
    'creation' => 'controllers/controller_creation.php'
];

// Check if route exists
if (array_key_exists($route, $routes)) {
    $controller_file = $routes[$route];
    if (file_exists($controller_file)) {
        require_once $controller_file;
    } else {
        // Controller file not found
        header("HTTP/1.0 404 Not Found");
        include 'view/404.php';
    }
} else {
    // Route not found
    header("HTTP/1.0 404 Not Found");
    include 'view/404.php';
}
?> 