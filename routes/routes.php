<?php

$router->get('/', 'controllers/home.php');

/* add routes for
*  create, destroy, edit
* show, store, and update
 */
$router->get('/' , 'controllers/notes/index.php');