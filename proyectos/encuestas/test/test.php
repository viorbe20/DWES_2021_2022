<?php
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');
require_once('..\app\Models\DBAbstractModel.php');
use App\Models\Pregunta;
use App\Models\Opcion;
use App\Models\REP;
use App\Models\Respuesta;

$p = Pregunta::getInstancia();
$o = Opcion::getInstancia();
$rep = REP::getInstancia();
$r = Respuesta::getInstancia();

//$respuestas = array(
//["id_encuesta"]=> int(1) 
// ["id_pregunta"]=> int(11)
//array(
//["id_opcion"]=> array(
//    array(1) (["id"]=> int())
//    array(1) (["id"]=> int()) 
//); 
$respuestas = array();
$repAll = $rep->getAll();
for ($i=0; $i < count($repAll); $i++) { 
    $respuestas[$i] = array(
        "id_REP" => $repAll[$i]['id'],
        "id_pregunta" => $repAll[$i]['id_pregunta'],
    );
}

for ($i=0; $i < count($respuestas); $i++) {
    //Establece id enc pre 
    $r->setIdEncuestaPregunta($respuestas[$i]['id_REP']);
    $o->setIdPregunta($respuestas[$i]['id_pregunta']);
    $a_idOpciones = $o->getIdByIdPregunta();

    var_dump($a_idOpciones);
    foreach ($a_idOpciones as $key => $value) {
        $r->setValor($value["id"]);
        $r->setEntity();
    }
}



