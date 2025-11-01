<?php
namespace Core;

/*Stores and resolve bindings of objects
* knows what to do 
*Create a container class with protected bindings array
* Create a function bind that accepts key and resolver as a parameter
*Create a resolve function that accepts key as a parameter
* and checks if array exists and binds the key with resolver
*/
class Container
{
    protected $bindings = [];

    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }
}