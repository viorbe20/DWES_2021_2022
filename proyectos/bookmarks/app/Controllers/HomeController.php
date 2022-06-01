<?php

namespace App\Controllers;

use App\Models\Usuario;

require_once('..\app\Config\constantes.php');

class HomeController extends BaseController
{

    public function indexAction()
    {
        $data = array();
        $user = Usuario::getInstancia();
        //Login
        if (isset($_POST["login"])) {

            if ((!empty($_POST['username']) || (!empty($_POST['psswrd'])))) {
                $user->setUser($_POST['username']);
                $user->setPsw($_POST['passwrd']);
                $result = $user->getByLogin();

                //Si hay coincidencia la devuelve
                if (!empty($result)) {
                    
                    //Cargamos usuarios bloqueados
                    // $blockedUsers = array();
                    // $user->setBloqueado(1);
                    // $blockedUsers = $user->getBlockedUsers();
                    // array_push($data, $blockedUsers);
                    
                    foreach ($result as $value) {
                        $_SESSION['user']['profile'] = $value['perfil'];
                        
                        if ($_SESSION['user']['profile'] == "user") {
                            header('location:' . DIRBASEURL . '/home/bookmarks');
                        } 
                        
                        if ($_SESSION['user']['profile'] == "admin"){
                            header('location:' . DIRBASEURL . '/home/users');
                        }                        
                    }
                } else {
                    //Si los datos no coinciden, sigue como invitado
                    $this->renderHTML('../view/index_view.php');
                }
            }
        } else {
            //Renderiza página inicio con los datos  
            $this->renderHTML('../view/index_view.php');
        }
    }
}
