<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Respuesta extends DBAbstractModel
{
    /*CONSTRUCCIÓN DEL MODELO SINGLETON*/
    private static $instancia;

    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

    private $id;
    private $id_encuesta_pregunta;
    private $valor;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setIdEncuestaPregunta($id_encuesta_pregunta)
    {
        $this->id_encuesta_pregunta = $id_encuesta_pregunta;
    }

    public function getIdEncuestaPregunta()
    {
        return $this->id_encuesta_pregunta;
    }
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setEntity()
    {
        $this->query = "INSERT INTO respuestas (id_encuesta_pregunta, valor)
                VALUES(:id_encuesta_pregunta, :valor)";
        $this->parametros['id_encuesta_pregunta'] = $this->id_encuesta_pregunta;
        $this->parametros['valor'] = $this->valor;
        $this->get_results_from_query();
    }

    public function getEntity($id)
    {
    }
    public function deleteEntity($id)
    {
    }
    public function editEntity()
    {
    }
    public function set()
    {
    }
    public function get()
    {
    }
    public function delete($user_data = array())
    {
    }
    public function edit()
    {
    }
}
