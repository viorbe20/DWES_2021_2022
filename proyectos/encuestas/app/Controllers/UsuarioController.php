<?php

namespace App\Controllers;

use App\Models\Encuesta;
use App\Models\Pregunta;
use App\Models\REP;
use App\Models\Usuario;
use App\Models\Opcion;
use App\Models\Respuesta;


require_once('..\app\Config\constantes.php');

class UsuarioController extends BaseController
{

    public function answerSurveyAction($request)
    {

        $data = array();
        $e = Encuesta::getInstancia();
        $rep = REP::getInstancia();
        $p = Pregunta::getInstancia();
        $o = Opcion::getInstancia();

        $parts = explode("/", $request);
        $idEncuesta = end($parts);
        $e->setId($idEncuesta);

        //Guarda nombre encuesta
        $descripcionEncuesta = $e->getById()[0]['descripcion'];
        $data[0] = ["descripcion" => $descripcionEncuesta];
        $rep->setIdEncuesta($e->getId());
        $a_idPreguntas = $rep->getIdPreguntaByIdEncuesta();

        //Recorre array de ids preguntas para meter toda la info de preguntas en el array
        for ($i = 0; $i < count($a_idPreguntas); $i++) {
            $p->setId($a_idPreguntas[$i]['id_pregunta']);
            $data[1]["preguntas"][$i] = ["id" => $a_idPreguntas[$i]['id_pregunta'], "descripcion" => $p->getDescripcionById()[0]['descripcion'], "opciones" => array()];
        }

        //Saca los campos de opciones y lo meto en el array for ($i=0; $i < count($a_idPreguntas); $i++) { 
        for ($i = 0; $i < count($a_idPreguntas); $i++) {
            $o->setIdPregunta($a_idPreguntas[$i]['id_pregunta']);
            $data[1]["preguntas"][$i]['opciones'] = ["id" => $o->getAllByIdPregunta()[$i]['id'], "opcion" => $o->getAllByIdPregunta()[$i]['opcion']];
        }
        $this->renderHTML("../view/selectedsurvey_view.php", $data);
    }

    public function showSurveysAction()
    {

        if (isset($_POST['btn_showSurvey'])) {
            $data = array();
            $idEncuesta = $_POST['surveys'];
            $data[0] = $idEncuesta;
            header('location:' . DIRBASEURL . '/home/showsurveys/selectedsurvey/' . $data[0]);
        } else {
            $data = array();
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
