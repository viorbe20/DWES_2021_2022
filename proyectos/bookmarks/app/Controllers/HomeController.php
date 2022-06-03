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
        foreach ($user->getAll() as $key => $value) {
            $bloqueado = $value['bloqueado'];
        }
        //Login
        if (isset($_POST["login"])) {

            if ((!empty($_POST['username']) || (!empty($_POST['psswrd'])))) {
                if ($bloqueado == 1) { //Comprueba que no está bloqueado
                    echo '<script language="javascript">';
                    echo 'alert("Usuario pendiente de permisos.")';
                    echo '</script>';
                    //header('location:' . DIRBASEURL . '/home/bookmarks');
                } else {
                    $user->setUser($_POST['username']);
                    $user->setPsw($_POST['passwrd']);
                    $result = $user->getByLogin();

                    //Si hay coincidencia la devuelve
                    if (!empty($result)) {

                        foreach ($result as $value) {
                            $_SESSION['user']['profile'] = $value['perfil'];
                            $_SESSION['user']['id'] = $value['id']; //establecemos el id al usuario de la sesión

                            if ($_SESSION['user']['profile'] == "user") {
                                header('location:' . DIRBASEURL . '/home/bookmarks');
                            }

                            if ($_SESSION['user']['profile'] == "admin") {
                                header('location:' . DIRBASEURL . '/home/users');
                            }
                        }
                    } else {
                        //Si los datos no coinciden, sigue como invitado
                        $this->renderHTML('../view/index_view.php');
                    }
                }
            }
        } else {
            //Renderiza página inicio con los datos  
            $this->renderHTML('../view/index_view.php');
        }
    }
}
