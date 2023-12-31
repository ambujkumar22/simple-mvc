<?php

define("BASE_PATH", 'http://'.$_SERVER['HTTP_HOST'].'/demo_website/');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = require base_path('./routes.php');

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