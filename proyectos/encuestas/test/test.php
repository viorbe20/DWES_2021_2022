<?php
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');
require_once('..\app\Models\DBAbstractModel.php');
use App\Models\Pregunta;
use App\Models\Opcion;

$p = Pregunta::getInstancia();
$o = Opcion::getInstancia();


$p->setDescripcion('Pregunta de prueba');
$p->setEntity();
$o->setOpcion('Con frecuencia');
$idPregunta = $p->lastInsert();
$o->setIdPregunta($idPregunta);
$o->setEntity();


?>