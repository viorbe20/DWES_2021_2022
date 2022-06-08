<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Models\Pregunta;
use App\Models\Encuesta;
use App\Models\Opcion;

require_once('..\app\Config\constantes.php');

class AdminController extends BaseController
{

    public function managequestionsAction()
    {

        
        if ((isset($_POST['btn_create'])) && (!empty($_POST['description']))) {
            
            //Crea número de respuesta seleccionadas
            $inputNum =  $_POST['numAnswers'];
            $data = array();
            $p = Pregunta::getInstancia();
            $p->setDescripcion($_POST['description']);
            //$p->setEntity();
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

        if (isset($_POST['btn_search'])) {
            if (empty($_POST['input_search'])) {
                $four = $p->getOnlyFour();
                array_push($data, $four);
                //Carga 4  preguntas
                $this->renderHTML('../view/managesurveys_view.php', $data);
            } else {
                $result = array();
                //$result = $p->getByDescription($_POST['input_search']);
                //array_push($data, $result);
                array_push($data, $p->getByName($_POST["input_search"]));
                $this->renderHTML('../view/managesurveys_view.php', $data);
            }
        } else if (isset($_POST['btn_add'])) {
            echo ('<br>');
            var_dump($_POST['add[]']);
            $this->renderHTML('../view/managesurveys_view.php', $data);
        } else {

            //$data[0]4 pregutnas, [1]las encuestas
            array_push($data, $p->getOnlyFour(), $e->getAll());
            $this->renderHTML('../view/managesurveys_view.php', $data);
        }
    }

    public function manageusersAction()
    {
        $data = array();
        $this->renderHTML('../view/manageusers_view.php', $data);
    }
}
