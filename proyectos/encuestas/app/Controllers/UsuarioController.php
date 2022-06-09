<?php

namespace App\Controllers;

use App\Models\Encuesta;
use App\Models\Pregunta;
use App\Models\Usuario;


require_once('..\app\Config\constantes.php');

class UsuarioController extends BaseController
{

    public function answerSurveyAction($request){
        $data = array();
        $e = Encuesta::getInstancia();
        $parts=explode("=", $request);
        $idEncuesta = end($parts);
        $e->setId($idEncuesta);
        $data = array(
            "descripcion" => $e->getById()[0]['descripcion']
        );
        // $data = array(
        //     "descripcion" => $e->getById()[0]['descripcion'],
        //     "preguntas" => array(
        //         "id_pregunta" => ''
        //         "opciones"=> array(
        //             "id_opcion" => int
        //             "opcion" => string
        //         )
        //     )
        // );
        $this->renderHTML("../view/selectedsurvey_view.php", $data);
    }
    
    public function userAction(){
        
        $data = array();

        if (isset($_POST['btn_showSurvey'])) {
            $selectedSurvey = $_POST['surveys'];
            array_push($data, $selectedSurvey);
            $this->renderHTML("../view/selectedsurvey_view.php", $data);

        } else {
            $e = Encuesta::getInstancia();
            array_push($data, $e->getAll());
            $this->renderHTML('../view/showsurveys_view.php', $data);
        }
        
    }

    public function signupAction()
    {
        $user = Usuario::getInstancia();

        if (isset($_POST['btn_signup'])) {
            //Creamos el usuario
            $user->setNombre($_POST['name']);
            $user->setUsuario($_POST['username']);
            $user->setPsw($_POST['psw']);
            $user->setPerfil("user");
            $user->setEntity();
            $user = Usuario::getInstancia();
            header('Location:' . DIRBASEURL . '/home');
        } else if (isset($_POST['btn_cancel'])) {
            header('Location:' . DIRBASEURL . '/home');
        }

        $this->renderHTML('../view/signup_view.php');
    }

    public function logoutAction()
    {
        //Cierra sesión y envía a la página de inicio
        unset($_SESSION);
        session_destroy();
        header('Location:' . DIRBASEURL . '/home');
    }
}
