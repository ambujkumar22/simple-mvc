<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/demo_website/' => 'controllers/index.php',
    '/demo_website/about' => 'controllers/about.php',
    '/demo_website/contact' => 'controllers/contact.php',
    '/demo_website/notes' => 'controllers/notes.php',
    '/demo_website/note' => 'controllers/note.php',
];

function routeToController($uri, $routes){
    if(array_key_exists($uri,$routes)){
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404){
    http_response_code($code);

    require "views/{$code}.php";

    die();
}

routeToController($uri, $routes);