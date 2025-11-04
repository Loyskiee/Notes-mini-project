<?php

namespace Core\Middleware;

//handle if the user is authenticated
class Authenticated
{
    public function handle()
    {
        if(! isset($_SESSION['user'])){
            redirect('/');
        }
    }
}