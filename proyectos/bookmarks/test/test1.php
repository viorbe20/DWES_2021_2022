<?php
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');
use App\Models\Usuario;
use App\Models\Bookmark;

$bm = Bookmark::getInstancia();
$bm->setUrl("url");
$bm->setDescripcion('des');
$bm->setIdUsuario(3);
$bm->setEntity();
var_dump($bm);






?>