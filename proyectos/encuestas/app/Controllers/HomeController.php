<?php

namespace App\Controllers;

use App\Models\Usuario;

require_once('..\app\Config\constantes.php');

class HomeController extends BaseController
{

    public function indexAction()
    {
        //$data = array();

        //Login
        if (isset($_POST["login"])) {

            if ((!empty($_POST['username']) || (!empty($_POST['psswrd'])))) {
                $user = Usuario::getInstancia();
                $user->setUsuario($_POST['username']);
                $user->setPsw($_POST['passwrd']);
                $result = $user->getByLogin();

                //Si hay coincidencia la devuelve
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $_SESSION['user']['profile'] = $value['perfil'];
                        $_SESSION['user']['id'] = $value['id']; //establecemos el id al usuario de la sesión
                        $_SESSION['user']['name'] = $value['nombre']; //establecemos el nombre al usuario de la sesión

                        if ($_SESSION['user']['profile'] == "user") {
                            header('location:' . DIRBASEURL . '/home/showsurveys');
                        }

                        if ($_SESSION['user']['profile'] == "admin") {
                            header('location:' . DIRBASEURL . '/home/managesurveys');
                        }
                    }
                } else {
                    //Si los datos no coinciden, sigue como invitado
                    $this->renderHTML('../view/index_view.php');
                }
                //}
            }
        } else {
            //Renderiza página inicio con los datos
            $data = array();

            $this->renderHTML('../view/index_view.php', $data);
        }
    }
}
