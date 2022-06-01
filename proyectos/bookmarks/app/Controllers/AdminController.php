<?php

namespace App\Controllers;

use App\Models\Usuario;

require_once('..\app\Config\constantes.php');

class AdminController extends BaseController
{
    public function getUsersAction(){
        $user = Usuario::getInstancia();
        $user->getAll();
        $allUsers = array();
        $allUsers = $user;
        var_dump($allUsers);
        $this->renderHTML('../view/users_view.php');
    }
}
