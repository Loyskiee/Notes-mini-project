<?php

require ("../Database.php");
require ("../functions.php");
require ("../Validator.php");

$config = require("../config.php");
$db = new Database($config['database']);

$heading = "Update Note";

$id = $_GET['id'] ?? null;

if (! $id) {
    die("Note id is required!");
}

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $id
])->find();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of no more than 1,000 characters is needed.';
    }

    if (empty($errors)) {
        $db->query(
            'UPDATE notes SET body = :body WHERE id = :id AND user_id = :user_id',
            [
                'id' => $id,
                'user_id' => 1, // simulate current user
                'body' => $_POST['body']
            ]
        );

        header("Location: note.php?id=" . $id);
        exit();
    }
}

require ("../views/update.php");
