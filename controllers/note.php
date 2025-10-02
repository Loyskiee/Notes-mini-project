<?php

require("../Database.php");
require ("../functions.php");
require ("../Response.php");
$config = require("../config.php");

$db = new Database($config['database']);

$heading = "Note";

$currentUserId = 1;

$id = $_GET['id'] ?? null;

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_GET['id']
])->find();



authorize($note['user_id'] === $currentUserId);

require("../views/note.view.php");