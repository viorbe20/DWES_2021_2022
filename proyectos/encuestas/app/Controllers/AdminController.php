<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Models\Pregunta;
use App\Models\Encuesta;
use App\Models\Opcion;
use App\Models\REP;

require_once('..\app\Config\constantes.php');

class AdminController extends BaseController
{

    public function managequestionsAction()
    {

        $data = array();

        if ((isset($_POST['btn_create'])) && (!empty($_POST['description']))) {

            //Crea número de respuesta seleccionadas
            $inputNum =  $_POST['numAnswers'];
            $p = Pregunta::getInstancia();
            $p->setDescripcion($_POST['description']);
            $description = $p->getDescripcion();
            array_push($data, $inputNum);
            array_push($data, $description);
            $this->renderHTML('../view/managequestions_view.php', $data);

            //Añade pregunta a la base de datos
        } else if (isset($_POST['btn_add'])) {
            $p = Pregunta::getInstancia();
            $p->setDescripcion($_POST['description']);
            $p->setEntity();
            $o = Opcion::getInstancia();

            for ($i = 1; $i < 11; $i++) {
                $idPregunta = $p->lastInsert();
                if (isset($_POST['option' . $i])) {
                    $o->setOpcion($_POST['option' . $i]);
                    $o->setIdPregunta($idPregunta);
                    $o->setEntity();
                }
            }
            $this->renderHTML('../view/managequestions_view.php');
        } else if (isset($_POST['btn_cancel'])) {
            $data = array();
            $this->renderHTML('../view/managequestions_view.php', $data);
        } else {
            $this->renderHTML('../view/managequestions_view.php');
        }
    }

    public function managesurveysAction()
    {
        $data = array();
        $p = Pregunta::getInstancia();
        $e = Encuesta::getInstancia();

        array_push($data, $p->getOnlyFour(), $e->getAll(), "checked");

        if (isset($_POST['btn_search'])) {
            $this->renderHTML('../view/managesurveys_view.php', $data);
        } elseif (isset($_POST['btn_unmarkAll'])) {
            $data[2] = "";
            $this->renderHTML('../view/managesurveys_view.php', $data);
        } elseif (isset($_POST['btn_add'])) {
            $rep = REP::getInstancia();

            //Recoge las preguntas y encuestas seleccionadas
            foreach ($_POST['selected'] as $value) {
                $partes = explode(" ", $value);
                $idPregunta = $partes[0];
                $rep->setIdPregunta($idPregunta);
                $idEncuesta = $partes[1];
                $rep->setIdEncuesta($idEncuesta);
                $rep->setEntity();
            }
            $this->renderHTML('../view/managesurveys_view.php', $data);

        } else {
            $this->renderHTML('../view/managesurveys_view.php', $data);
        }
    }

    public function manageusersAction()
    {
        $data = array();
        $this->renderHTML('../view/manageusers_view.php', $data);
    }
}
