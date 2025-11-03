<?php
// Use namespaced classes like  App, Validator, and Database 
use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$errors = [];


$currentUser = $_SESSION['user'] ?? null;

if($currentUser){
   $db->insert([
        'user_id' => $currentUser,
        'body' => $_POST['body']
   ]);
}

if(! Validator::string($_POST['body'], 1, 1000)){
    $errors['body'] = 'A body of 1000 characters is required. ';
}

if(! empty($errors)){
    return view("notes/create.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

