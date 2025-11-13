<?php
//bootstrap.php is used for preparing things in my application before it runs
use Core\App;
use Core\Container;
use Core\Database;


$container = new Container(); //creates a new service container

$container->bind('Core\Database', function(){//binding database, or showing how to create a database class
    $config = require basePath('config.php');

    return new Database($config['database']);
});

App::setContainer($container); //makes globally accessible throughout the application