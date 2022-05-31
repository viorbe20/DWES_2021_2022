<?php

namespace App\Controllers;

require_once('..\app\Config\constantes.php');

class UserController extends BaseController
{
    public function signupAction()
    {
        if (isset($_POST['btn_signup'])) {
            //Hacer lo que proceda
            header('Location:' . DIRBASEURL . '/index');
        } else if (isset($_POST['btn_cancel'])) {
            header('Location:' . DIRBASEURL . '/index');
        } else {
            $this->renderHTML('../view/require/signup_view.php');
        }
    }

    public function logoutAction()
    {
        //Cierra sesión y envía a la página de inicio
        unset($_SESSION);
        session_destroy();
        header('Location:' . DIRBASEURL . '/index');
    }
}
