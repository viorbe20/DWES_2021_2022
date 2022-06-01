<?php
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');
use App\Models\Usuario;
use App\Models\Bookmark;

$bm = Bookmark::getInstancia();
$user = Usuario::getInstancia();
$user->setId(1);
$bm->setIdUsuario(1);
$result = array();
$userBookmarks = $user-> getUserAndBookmarks();
var_dump($userBookmarks);






?>