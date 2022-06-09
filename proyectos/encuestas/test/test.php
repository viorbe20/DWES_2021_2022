<?php
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');
require_once('..\app\Models\DBAbstractModel.php');

use App\Models\Encuesta;
use App\Models\Pregunta;
use App\Models\Opcion;
use App\Models\REP;
use App\Models\Respuesta;

$p = Pregunta::getInstancia();
$o = Opcion::getInstancia();
$rep = REP::getInstancia();
$r = Respuesta::getInstancia();
$e = Encuesta::getInstancia();

$data = array();
$idEncuesta = 3;
$e->setId($idEncuesta);
//Guarda nombre encuesta
$descripcionEncuesta = $e->getById()[0]['descripcion'];
$data[0] = ["descripcion"=> $descripcionEncuesta];
$rep->setIdEncuesta($e->getId());
$a_idPreguntas = $rep->getIdPreguntaByIdEncuesta();

//Recorre array de ids preguntas para meter toda la info de preguntas en el array
for ($i=0; $i < count($a_idPreguntas); $i++) { 
    $p->setId($a_idPreguntas[$i]['id_pregunta']);
    $data[1]["preguntas"][$i] = ["id"=>$a_idPreguntas[$i]['id_pregunta'], "descripcion"=>$p->getDescripcionById()[0]['descripcion'], "opciones"=>array()]; 
}

//Saca los campos de opciones y lo meto en el array for ($i=0; $i < count($a_idPreguntas); $i++) { 
    for ($i=0; $i < count($a_idPreguntas); $i++) { 
        $o->setIdPregunta($a_idPreguntas[$i]['id_pregunta']);
        //var_dump($o->getAllByIdPregunta()[$i]);
        $data[1]["preguntas"][$i]['opciones'] = ["id"=>$o->getAllByIdPregunta()[$i]['id'], "opcion"=>$o->getAllByIdPregunta()[$i]['opcion'] ]; 
    } 
var_dump($data);

//getAllByIdPregunta()



