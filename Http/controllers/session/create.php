<?php

use Core\Session;
//view tbe form 
view('session/create.view.php', [
    'errors' => Session::get('errors')
]);