<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Pregunta extends DBAbstractModel
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

    public function setEntity()
    {
        $this->query = "INSERT INTO preguntas (descripcion)
                VALUES(:descripcion)";
        $this->parametros['descripcion'] = $this->descripcion;

        $this->get_results_from_query();
    }

        public function getById()
    {
        $this->query = "SELECT * FROM preguntas WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getAll()
    {
        $this->query = "SELECT * FROM preguntas";
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }

    public function getOnlyFour()
    {
        $this->query = "SELECT * FROM preguntas";
        $this->get_results_from_query();
        //Muestra los 4 últimos registros
        $last = array_slice(array_reverse($this->rows), 0, 4);
        return $last;
    }
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
