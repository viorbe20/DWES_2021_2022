<?php

namespace App\Controllers;
use App\Models\Usuario;
use App\Models\Bookmark;


require_once('..\app\Config\constantes.php');

class UsuarioController extends BaseController
{
    public function signupAction()
    {
        $user = Usuario::getInstancia();
        $bm = Bookmark::getInstancia();
    
        if (isset($_POST['btn_signup'])){
            //Creamos el usuario
            $user->setNombre($_POST['name']);
            $user->setUser($_POST['username']);
            $user->setPsw($_POST['psw']);
            $user->setEmail($_POST['email']);
            $user->setPerfil("user");
            $user->setBloqueado(1);
            $user->setEntity();

            //Creamos bookmark
            $bm->setUrl($_POST['url']);
            $bm->setDescripcion($_POST['description']);
            $idUser = $user->lastInsert();
            $bm->setIdUsuario($idUser);
            $bm->setEntity();

            header('Location:' . DIRBASEURL . '/bookmarks');
        } else if (isset($_POST['btn_cancel'])){
            header('Location:' . DIRBASEURL . '/bookmarks');
        }

        $this->renderHTML('../view/require/signup_view.php');
    }

    public function logoutAction()
    {
        //Cierra sesión y envía a la página de inicio
        unset($_SESSION);
        session_destroy();
        header('Location:' . DIRBASEURL . '/bookmarks');
    }
}
