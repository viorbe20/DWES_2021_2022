<?php

namespace App\Controllers;

use App\Models\User;

require_once('..\app\Config\constantes.php');

class DefaultController extends BaseController
{

    public function indexAction(){
        $data = array();
        $this->renderHTML('../view/index_view.php', $data);
    }
    // public function indexAction()
    // {
    //     $data = array();
    //     $user = User::getInstancia();

    //     //Login
    //     if (isset($_POST["login"])) {

    //         if ((!empty($_POST['username']) || (!empty($_POST['psswrd'])))) {
    //             $user = User::getInstancia();
    //             $user->setUsername($_POST['username']);
    //             $user->setPasswrd($_POST['passwrd']);
    //             $result = $user->getByLogin();

    //             //Si hay coincidencia la devuelve
    //             if (!empty($result)) {
    //                 foreach ($result as $value) {
    //                     $_SESSION['user']['profile'] = $value['prfl'];
    //                     $this->renderHTML('../view/index_view.php', $data);
    //                 }
    //             } else {
    //                 //Si los datos no coinciden, iniciamos sesión con datos vacíos
    //                 $this->renderHTML('../view/index_view.php', $data);
    //             }
    //         }
    //     } else {
    //         //Renderiza página inicio con los datos  
    //         $this->renderHTML('../view/index_view.php', $data);
    //     }
    // }
}