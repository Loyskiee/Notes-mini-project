<?php
//This class is used for authenticating the user
namespace Core;

use Core\Session;

//declaration of class
class Authenticator
{
    public function attempt($attribute) //tries to attempt if a user does exist
    {
            $user = App::resolve(Database::class)->query('SELECT * FROM USERS WHERE email = :email',  //check if the user exist in the database
            [
                'email' => $_POST['email']
            ])->find();

            //verify the password of the user
            if($user) {
                
            }
    }
    //login function
    public function login($user){
        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email']
        ];
    }
    //logout function
    public function logout($user){
        Session::destroy();
    }
}






