<?php

namespace Core\Middleware;
//handle if user is guest

class Guest
{
    public function handle()
    {
        if(isset($_SESSION['user'])){
            redirect('/');
        }
    }
}