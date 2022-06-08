<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class REP extends DBAbstractModel
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
    private $id_pregunta;
    private $id_encuesta;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setIdPregunta($id_pregunta)
    {
        $this->id_pregunta = $id_pregunta;
    }

    public function getIdPregunta()
    {
        return $this->id_pregunta;
    }

    public function setIdEncuesta($id_encuesta)
    {
        $this->id_encuesta = $id_encuesta;
    }

    public function getIdEncuesta()
    {
        return $this->id_encuesta;
    }

    public function setEntity()
    {
        $this->query = "INSERT INTO r_encuestas_preguntas (id_pregunta, id_encuesta)
                VALUES(:id_pregunta, :id_encuesta)";
        $this->parametros['id_pregunta'] = $this->id_pregunta;
        $this->parametros['id_encuesta'] = $this->id_encuesta;
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
