<?php

namespace App\Controllers;

use App\Models\Usuario;

require_once('..\app\Config\constantes.php');

class AdminController extends BaseController
{
    public function getUsersAction()
    {
        $data = array();
        $user = Usuario::getInstancia();
        $blockedUsers = array();
        $user->setBloqueado(1);
        $blockedUsers = $user->getBlockedUsers();
        array_push($data, $blockedUsers);
        //var_dump($blockedUsers);
        $this->renderHTML('../view/users_view.php', $data);
    }
}
