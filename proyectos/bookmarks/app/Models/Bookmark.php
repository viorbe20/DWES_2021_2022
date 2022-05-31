<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Bookmark extends DBAbstractModel
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

    /*FIN DE LA CONSTRUCCIÓN DEL MODELO SINGLETON*/

    //Propiedades del objeto
    private $id;
    private $bm_url;
    private $descripcion;
    private $id_usuario;

    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setBmurl($bm_url)
    {
        $this->bm_url = $bm_url;
    }

    public function getBmurl()
    {
        return $this->bm_url;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setIdusuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }
    
    public function getIdusuario()
    {
        return $this->id_usuario;
    }

    public function getByUserId(){
        $this->query = "SELECT * FROM bookmarks WHERE id_usuario=:id_usuario";
        $this->parametros['id_usuario'] = $this->id_usuario;
        $this->get_results_from_query();
        $result = $this->rows;
        return $result;
    }


    //Métodos que pide la clase para no dar error
    public function getEntity($id)
    {
    }
    public function setEntity()
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
    public function delete($user_data = array()){

    }
    public function edit()
    {
    }
}
