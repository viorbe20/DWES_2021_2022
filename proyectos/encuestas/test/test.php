<?php
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');
require_once('..\app\Models\DBAbstractModel.php');
use App\Models\Usuario;
use App\Models\Pregunta;
use App\Models\Opcion;
use App\Models\DBAbstractModel;

$p = Pregunta::getInstancia();
$o = Opcion::getInstancia();

$idQuestion = array();
$idQuestion = $o->lastInsert();
var_dump($idQuestion)
?>