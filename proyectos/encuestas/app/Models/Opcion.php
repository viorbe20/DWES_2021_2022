<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Opcion extends DBAbstractModel
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
    private $opcion;

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

    public function setOpcion($opcion)
    {
        $this->opcion = $opcion;
    }

    public function getOpcion()
    {
        return $this->opcion;
    }

    public function setEntity()
    {
        $this->query = "INSERT INTO opciones (id_pregunta, opcion)
                VALUES(:id_pregunta, :opcion)";
        $this->parametros['id_pregunta'] = $this->id_pregunta;
        $this->parametros['opcion'] = $this->opcion;
        $this->get_results_from_query();
    }

    public function getAll()
    {
        $this->query = "SELECT * FROM opciones";
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getByDescription($opcion)
    {   $opcion = "%" . $opcion . "%";
        $this->query = "SELECT * FROM opciones WHERE opcion LIKE :opcion";
        $this->parametros['opcion'] = $this->opcion;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getByName()
    {
        $this->query = "SELECT * FROM opciones WHERE opcion LIKE :opcion";
        $this->parametros['opcion'] = $this->opcion;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getById()
    {
        $this->query = "SELECT id_pregunta FROM opciones WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getOptionById()
    {
        $this->query = "SELECT opcion FROM opciones WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    
    public function getIdByIdPregunta()
    {
        $this->query = "SELECT id FROM opciones WHERE id_pregunta=:id_pregunta";
        $this->parametros['id_pregunta'] = $this->id_pregunta;
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getAllByIdPregunta()
    {
        $this->query = "SELECT * FROM opciones WHERE id_pregunta=:id_pregunta";
        $this->parametros['id_pregunta'] = $this->id_pregunta;
        $this->get_results_from_query();
        return $this->rows;
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
