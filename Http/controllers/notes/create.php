<?php

view("notes/create.view.php", [
    'heading' => 'Create Note',
    'errors' => []
]);
//show the form view
/*use Core\Database;
use Core

require ("../Database.php");
require ("../functions.php");
require ("../Validator.php");

$config = require('../config.php');
$db = new Database($config['database']);

$heading = "Create a note";


$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of no more than 1,000 characters in needed.';
    }

    if(empty($errors)) {
        $db->query('INSERT INTO notes (user_id, body) VALUES(:user_id, :body)',
        [
            'user_id' => 1,
            'body' => $_POST['body']
        ]
        );
    }
}

require basePath("views/notes/create.view.php");
*/