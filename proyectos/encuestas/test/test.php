<?php
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');
require_once('..\app\Models\DBAbstractModel.php');
use App\Models\Pregunta;
use App\Models\Opcion;

$p = Pregunta::getInstancia();
$o = Opcion::getInstancia();

//$o->setId(3);
//$o>getByDescription($opcion);
$p->setDescripcion("frencuencia");
var_dump($p->getByDescription());

?>