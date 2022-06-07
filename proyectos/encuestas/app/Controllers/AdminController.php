<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Models\Pregunta;
use App\Models\Opcion;

require_once('..\app\Config\constantes.php');

class AdminController extends BaseController
{

    public function addquestionAction()
    {

        $p = Pregunta::getInstancia();

        if ((isset($_POST['btn_create'])) && (!empty($_POST['description']))) {
            //Añade pregunta
            $inputNum =  $_POST['numAnswers'];
            $data = array();
            $p->setDescripcion($_POST['description']);
            $p->setEntity();
            $description = $p->getDescripcion();
            array_push($data, $inputNum);
            array_push($data, $description);
            $this->renderHTML('../view/addquestion_view.php', $data);
        }else if (isset($_POST['btn_add'])) {
            $p = Pregunta::getInstancia();
            for ($i = 1; $i < 11; $i++) {
                if (isset($_POST['option'.$i])) {
                    $idQuestion = $p->lastInsert();
                    echo($idQuestion);
                }
            }
            $this->renderHTML('../view/managequestion_view.php');
        } else if (isset($_POST['btn_cancel'])) {
            $this->renderHTML('../view/managequestion_view.php');
        } else {
            $this->renderHTML('../view/addquestion_view.php');
        }
    }

    public function managequestionsAction()
    {
        $p = Pregunta::getInstancia();
        $four = $p->getOnlyFour();
        $data = array();
        array_push($data, $four);
        //Carga todas las preguntas

        $this->renderHTML('../view/managequestions_view.php', $data);
    }

    public function managesurveysAction()
    {
        $data = array();
        $this->renderHTML('../view/managesurveys_view.php', $data);
    }

    public function manageusersAction()
    {
        $data = array();
        $this->renderHTML('../view/manageusers_view.php', $data);
    }


    // public function getUsersAction()
    // {
    //     $data = array();
    //     $user = Usuario::getInstancia();
    //     $blockedUsers = array();
    //     $user->setBloqueado(1);
    //     $blockedUsers = $user->getBlockedUsers();
    //     array_push($data, $blockedUsers);

    //     if (isset($_POST['btn_unlock'])) {
    //         if (!empty($_POST["selected"])) {
    //             foreach ($_POST["selected"] as $key => $value) {
    //                 $user->setId($value);
    //                 $user->setBloqueado(0);
    //                 $user->unblockUser();
    //             }
    //             header('location:' . DIRBASEURL . '/home/users');
    //         }
    //     } else {
    //         $this->renderHTML('../view/users_view.php', $data);
    //     }
    // }
}
