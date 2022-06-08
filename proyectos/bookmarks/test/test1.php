<?php
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');
use App\Models\Usuario;
use App\Models\Bookmark;

$bm = Bookmark::getInstancia();
$user = Usuario::getInstancia();

$user->setNombre('Andrea');
$user->setUser('andy');
$user->setPsw('andy');
$user->setEmail('andy@andy.com');
$user->setPerfil("user");
$user->setBloqueado(1);
$user->setEntity();

//Creamos bookmark
$bm->setUrl('https://www.iesgrancapitan.org/');
$bm->setDescripcion("Instituto");
$idUser = $user->lastInsert();
$bm->setIdUsuario($idUser);
$bm->setEntity();





?>