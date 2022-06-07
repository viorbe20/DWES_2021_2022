<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Encuesta extends DBAbstractModel
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
    private $descripcion;
    private $fecha;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }
    
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setEntity()
    {
        $this->query = "INSERT INTO encuestas (descripcion, fecha)
                VALUES(:descripcion, :fecha)";
        $this->parametros['descripcion'] = $this->descripcion;
        $this->parametros['fecha'] = $this->fecha;
        $this->get_results_from_query();
    }

        public function getById()
    {
        $this->query = "SELECT * FROM encuestas WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getAll()
    {
        $this->query = "SELECT * FROM encuestas";
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }


    // public function getByDescription($descripcion)
    // {   $descripcion = "%" . $descripcion ."%";
    //     $this->query = "SELECT descripcion FROM preguntas WHERE descripcion LIKE :descripcion";
    //     $this->parametros['descripcion'] = $this->descripcion;
    //     $this->get_results_from_query();
    //     return $this->rows;
    // }

    // public function getByName()
    // {
    //     $this->query = "SELECT descripcion FROM preguntas WHERE descripcion LIKE :descripcion";
    //     $this->parametros['descripcion'] = $this->descripcion;
    //     $this->get_results_from_query();
    //     return $this->rows;
    // }
    // public function getUserAndBookmarks()
    // {
    //     $result = array();
    //     //Get user by id
    //     $this->query = "SELECT * FROM usuarios WHERE id=:id";
    //     $this->parametros['id'] = $this->id;
    //     $this->get_results_from_query();
    //     array_push($result, $this->rows);

    //     //Get bookmarks by userId
    //     $this->query = "SELECT * FROM bookmarks WHERE id_usuario=:id_usuario";
    //     //Añadimos el id del usuario
    //     $this->parametros['id_usuario'] = $this->id;
    //     $this->get_results_from_query();
    //     array_push($result, $this->rows);

    //     return $result;
    // }




    // public function unblockUser()
    // {
    //     $this->query = "UPDATE usuarios SET bloqueado=:bloqueado WHERE id=:id";
    //     $this->parametros['bloqueado'] = $this->bloqueado;
    //     $this->parametros['id'] = $this->id;
    //     $this->get_results_from_query();
    // }





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
