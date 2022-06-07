<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Usuario extends DBAbstractModel
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
    private $nombre;
    private $usuario;
    private $psw;
    private $perfil;



    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setPsw($psw)
    {
        $this->psw = $psw;
    }

    public function getPsw()
    {
        return $this->psw;
    }

    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;
    }

    public function getPerfil()
    {
        return $this->perfil;
    }

    public function setEntity()
    {
        $this->query = "INSERT INTO usuarios(nombre, usuario, psw, perfil)
                VALUES(:nombre, :usuario, :psw, :perfil)";
        $this->parametros['nombre'] = $this->nombre;
        $this->parametros['usuario'] = $this->usuario;
        $this->parametros['psw'] = $this->psw;
        $this->parametros['perfil'] = $this->perfil;

        $this->get_results_from_query();
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

    // public function getAll()
    // {
    //     $this->query = "SELECT * FROM usuarios";
    //     $this->get_results_from_query();
    //     $result = $this->rows;
    //     return $result;
    // }


    // public function unblockUser()
    // {
    //     $this->query = "UPDATE usuarios SET bloqueado=:bloqueado WHERE id=:id";
    //     $this->parametros['bloqueado'] = $this->bloqueado;
    //     $this->parametros['id'] = $this->id;
    //     $this->get_results_from_query();
    // }

    // public function getByLogin()
    // {
    //     $this->query = "SELECT * FROM usuarios WHERE user=:user AND psw=:psw";
    //     $this->parametros['user'] = $this->user;
    //     $this->parametros['psw'] = $this->psw;
    //     $this->get_results_from_query();
    //     $result = $this->rows;
    //     return $result;
    // }

    // public function getById()
    // {
    //     $this->query = "SELECT * FROM usuarios WHERE id=:id";
    //     $this->parametros['id'] = $this->id;
    //     $this->get_results_from_query();
    //     $result = $this->rows;
    //     return $result;
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
