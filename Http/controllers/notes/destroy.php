<?php
use Core\Database;


$config = require("../config.php");
$db = new Database($config['database']);

$id = $_GET['id'] ?? null;

if(! $id){
    die("Note id is required!");
}

$note = $db->query('DELETE FROM notes WHERE id = :id AND user_id = :user_id', [

    'id' => $id,
    'user_id' => 1   
]
);

header("Location: notes.php");
exit();


