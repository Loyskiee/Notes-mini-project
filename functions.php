<?php

function urlIs($value)
{
    return $_SERVER['REQUEST_METHOD'] === $value;
}


function authorize($condition, $status = Response::FORBIDDEN) {
    if (! $condition) {
        abort($status);
    }
}

function abort($code = Response::NOT_FOUND) {
    http_response_code($code);
    require "views/partials/{$code}.php";
    die();
}
