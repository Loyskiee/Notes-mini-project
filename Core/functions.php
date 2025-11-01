<?php
use Core\Response;

function urlIs($value)
{
    return $_SERVER['REQUEST_METHOD'] === $value;
}


function authorize($condition, $status = Response::FORBIDDEN) {
    if (! $condition) {
        abort($status);
    }
}

function abort($code = Response::NOT_FOUND) 
{
    http_response_code($code);
    require basePath("views/partials/{$code}.php");
    die();
}

function basePath($path){
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require basePath('views/' . $path);
}