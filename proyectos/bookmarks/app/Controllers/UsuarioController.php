<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Models\Bookmark;


require_once('..\app\Config\constantes.php');

class UsuarioController extends BaseController
{
    public function searchBookmarkAction()
    {

    }

    public function deleteBookmarkAction($request)
    {
        if (isset($_POST['btn_delete'])) {
            $rest = explode("/", $request);
            $id = end($rest);
            $bm = Bookmark::getInstancia();
            $bm->setId($id);
            $bm->deletebyId();
            header('Location:' . DIRBASEURL . '/home/bookmarks');
        } else {
            $rest = explode("/", $request);
            $id = end($rest);
            $bm = Bookmark::getInstancia();
            $bm->setId($id);
            $result = $bm->getById();
            $data = array();
            array_push($data, $result);
            $this->renderHTML('../view/delete_bm_view.php', $data);
        }
    }

    public function editBookmarkAction($request)
    {
        if (isset($_POST['btn_edit'])) {
            $rest = explode("/", $request);
            $id = end($rest);
            $bm = Bookmark::getInstancia();
            $bm->setUrl($_POST['url']);
            $bm->setDescripcion($_POST['description']);
            $bm->setIdUsuario($id);
            $bm->setEntity();
            header('Location:' . DIRBASEURL . '/home/bookmarks');
        } else {
            $rest = explode("/", $request);
            $id = end($rest);
            $bm = Bookmark::getInstancia();
            $bm->setId($id);
            $result = $bm->getById();
            $data = array();
            array_push($data, $result);
            $this->renderHTML('../view/edit_bm_view.php', $data);
        }
    }

    public function addBookmarkAction()
    {
        if (isset($_POST['btn_signup'])) {
            $bm = Bookmark::getInstancia();
            $bm->setUrl($_POST['url']);
            $bm->setDescripcion($_POST['description']);
            $bm->setIdUsuario($_SESSION['user']['id']);
            $bm->setEntity();
            header('Location:' . DIRBASEURL . '/home/bookmarks/add');
        } else {
            $this->renderHTML('../view/add_bm_view.php');
        }
    }

    public function getBookmarksAction()
    {

        $data = array();
        $bm = Bookmark::getInstancia();
        $user = Usuario::getInstancia();

        if ((isset($_GET["search"])) && (!empty($_GET["inputWord"]))) {
            $bm->setUrl($_GET["inputWord"]);
            $result = $bm->getUrlByName();
            array_push($data, "", $result);
            $this->renderHTML('../view/bookmarks_view.php', $data);
        } else {
            $user->setId($_SESSION['user']['id']);
            $bm->setIdUsuario($_SESSION['user']['id']);
            $userBookmarks = array();
            $userBookmarks = $user->getUserAndBookmarks();
            $data = $userBookmarks;
            $this->renderHTML('../view/bookmarks_view.php', $data);
        }
    }

    public function signupAction()
    {
        $user = Usuario::getInstancia();
        $bm = Bookmark::getInstancia();

        if (isset($_POST['btn_signup'])) {
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
