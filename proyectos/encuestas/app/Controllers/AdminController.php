<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Models\Pregunta;
use App\Models\Encuesta;
use App\Models\Opcion;
use App\Models\REP;
use App\Models\Respuesta;


require_once('..\app\Config\constantes.php');

class AdminController extends BaseController
{
    public function addQuestionsAction($request)
    {
        $data = array();
        $p = Pregunta::getInstancia();
        $e = Encuesta::getInstancia();

        $parts = explode("/", $request);
        $idEncuesta = end($parts); 
        $e->setId($idEncuesta);
        $descripcion = $e->getById();

        $data[0] = $idEncuesta;
        $data[1] = $descripcion[0]['descripcion'];
        $data[2] = $p->getOnlyFour();
        $this->renderHTML('../view/addquestions_view.php', $data);


        // array_push($data, $p->getOnlyFour(), $e->getAll(), "checked");

        // if (isset($_POST['btn_search'])) {
        //     $this->renderHTML('../view/createsurvey_view.php', $data);
        // } elseif (isset($_POST['btn_unmarkAll'])) {
        //     $data[2] = "";
        //     $this->renderHTML('../view/createsurvey_view.php', $data);
        // } elseif (isset($_POST['btn_add'])) {
        //     $rep = REP::getInstancia();

        //     //Inserta r_encuestas_preguntas
        //     foreach ($_POST['selected'] as $value) {
        //         $partes = explode(" ", $value);
        //         $idPregunta = $partes[0];
        //         $rep->setIdPregunta($idPregunta);
        //         $idEncuesta = $partes[1];
        //         $rep->setIdEncuesta($idEncuesta);
        //         $rep->setEntity();
        //     }

        //     //Inserta respuestas
        //     $respuestas = array();
        //     $repAll = $rep->getAll();
        //     for ($i = 0; $i < count($repAll); $i++) {
        //         $respuestas[$i] = array(
        //             "id_REP" => $repAll[$i]['id'],
        //             "id_pregunta" => $repAll[$i]['id_pregunta'],
        //         );
        //     }

        //     $r = Respuesta::getInstancia();
        //     $o = Opcion::getInstancia();

        //     for ($i = 0; $i < count($respuestas); $i++) {
        //         //Establece id enc pre 
        //         $r->setIdEncuestaPregunta($respuestas[$i]['id_REP']);
        //         $o->setIdPregunta($respuestas[$i]['id_pregunta']);
        //         $a_idOpciones = $o->getIdByIdPregunta();

        //         foreach ($a_idOpciones as $key => $value) {
        //             $r->setValor($value["id"]);
        //             $r->setEntity();
        //         }
        //     }
        //     $this->renderHTML('../view/createsurvey_view.php', $data);
        // } else {
        //     $data[2] = $p->getOnlyFour();
        //     $this->renderHTML('../view/createsurvey_view.php', $data);
        // }
    }

    public function createsurveyAction()
    {
        $data = array();
        $e = Encuesta::getInstancia();
        $p = Pregunta::getInstancia();

        if ((isset($_POST['btn_add'])) && (!empty($_POST['description']))) {
            $e->setDescripcion($_POST['description']);
            $e->setFecha(date('Y-m-d', time()));
            $e->setEntity();
            $e->setId($e->lastInsert());
            $data[0]= $e->getId();
            header('location:' . DIRBASEURL . '/home/createsurvey/addquestions/' . $data[0]);
            //$this->renderHTML('../view/addquestions_view.php', $data);
        } else {

            $this->renderHTML('../view/createsurvey_view.php');
        }
    }
    public function createquestionsAction()
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
            $this->renderHTML('../view/createquestions_view.php', $data);

            //Añade pregunta a la base de datos
        } else if (isset($_POST['btn_add'])) {
            $p = Pregunta::getInstancia();
            $p->setDescripcion($_POST['description']);
            $p->setEntity();
            $o = Opcion::getInstancia();
            //Añade opciones a la bd extrayendo id  de la pregunta
            for ($i = 1; $i < 11; $i++) {
                $idPregunta = $p->lastInsert();
                if (isset($_POST['option' . $i])) {
                    $o->setOpcion($_POST['option' . $i]);
                    $o->setIdPregunta($idPregunta);
                    $o->setEntity();
                }
            }
            $this->renderHTML('../view/createquestions_view.php');
        } else if (isset($_POST['btn_cancel'])) {
            $data = array();
            $this->renderHTML('../view/createquestions_view.php', $data);
        } else {
            $this->renderHTML('../view/createquestions_view.php');
        }
    }




}
