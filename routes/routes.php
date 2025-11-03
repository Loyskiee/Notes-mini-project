<?php


$router->get('/', 'home.php');//main entry point

//creating a note
$router->get('/notes/create', 'notes/create.php');//shows the create form
$router->post('/notes' , 'notes/store.php');//storing the created notes

$router->get('/notes', 'notes/index.php')->only('auth'); //show only for the authenticated users
$router->get('/note', 'notes/show.php')->only('auth');//showing the specific note for the authenticated user
$router->delete('/note', 'notes/destroy.php');//deleting the note

//patch is for updating
$router->get('/note/edit', 'notes/edit.php');//shows the update form
$router->patch('/note', 'notes/update.php'); //updating the selected note


//registering routes

//register
$router->get('/register', 'registration/create.php')->only('guest');//show registration form
$router->post('/register', 'registration/store.php')->only('guest'); //store the user's information

//session routes

//login
$router->get('/login', 'session/create.php')->only('guest'); //show the login form
$router->post('/session', 'session/store.php')->only('auth');//authenticated and can see the content 
$router->delete('/session'. 'session/destroy.php')->only('auth');//logout





