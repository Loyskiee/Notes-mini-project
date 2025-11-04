<?php
//Middleware is a checkpoint filter, before it passes the destination
namespace Core\Middleware;

use Exception;

//map the user, based on status whether guest or authenticated user

class Middleware
{
    public const MAP = [
    'guest' => Guest::class,
    'auth' => Authenticated::class
];

//add resolve fucntion that accepts key
public function resolve($key)
{
    if(! $key){
        return;
    }

    if(!isset(self::MAP[$key])){
        throw new Exception("No Matching middleware found for {$key}");
    }

    $class = self::MAP[$key];
    return (new $class())->handle();
}

}
