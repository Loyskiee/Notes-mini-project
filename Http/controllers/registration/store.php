<?php
//use namespaced classes
use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = []; 
//validating the user credentials
if (! Validator::email($email)) { //validates email 
   $errors['email'] = 'Please provide a valid email address.';
}

if(! Validator::string($password, 7, 255)) { //checks the password
    $errors['password'] = 'Please provide a password minimum of 7 characters.';
}

//if no errror, redirect to the registration form
if(! empty($errors)){
    return view('views/registration/create.view.php', [
        'errors' => $errors
    ]);
}

//find user if it exists
$user = $db->query('SELECT * FROM users WHERE email = :email',[
    'email' => $email
])->find();

//if user does exist redirect to home
if($user){
    redirect('/');
} else{//if user does not exist, register it
    $user = $db->query('INSERT INTO users (password, email) VALUES(:password, :email)',[
    'email' => $email,
    'password' => password_hash($password, PASSWORD_DEFAULT)
]);

    //Let the user login
    Authenticator::login($user);

    redirect('/');
}

