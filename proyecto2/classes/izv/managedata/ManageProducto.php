<?php

namespace izv\managedata;

use \izv\data\Usuarios;
use \izv\database\Database;

class ManageProducto {

    private $db;

    function __construct(Database $db) {
        $this->db = $db;
    }

    function add(Usuarios $usuario) {
        $resultado = 0;
        echo '<pre>' . var_dump($usuario) . '</pre>';
        if($this->db->connect()) {
            $sql = 'insert into usuario values(:id, :correo, :alias, :nombre , :clave, :activo, :fechaalta)';
            $array = array(
                'id' => $usuario->getId(),
                'correo' => $usuario->getCorreo(),
                'alias' => $usuario->getAlias(),
                'nombre' => $usuario->getNombre(), 
                'clave' => $usuario->getClave(),
                'activo' => $usuario->getActivo(),
                'fechaalta' => $usuario->getFechaAlta()
            );
            if($this->db->execute($sql, $array)) {
                $resultado = $this->db->getConnection()->lastInsertId();
            }
        }
        return $resultado;
    }

    function edit(Usuarios $usuario) {
        $resultado = 0;
        if($this->db->connect()) {
            $sql = 'update usuario set correo = :correo, alias = :alias, nombre = :nombre,clave = :clave, activo = :activo, fechaalta =:fechaalta where id = :id';
            if($this->db->execute($sql, $usuario->get())) {
                $resultado = $this->db->getSentence()->rowCount();
            }
        }
        return $resultado;
    }

    function get($id) {
        $usuario = null;
        if($this->db->connect()) {
            $sql = 'select * from usuario where id = :id';
            $array = array('id' => $id);
            if($this->db->execute($sql, $array)) {
                if($fila = $this->db->getSentence()->fetch()) {
                    $usuario = new Usuarios();
                    $usuario->set($fila);
                }
            }
        }
        return $usuario;
    }

    function getAll() {
        $array = array();
        if($this->db->connect()) {
            $sql = 'select * from usuario order by nombre';
            if($this->db->execute($sql)) {
                while($fila = $this->db->getSentence()->fetch()) {
                    $usuarios = new Usuarios();
                    $usuarios->set($fila);
                    $array[] = $usuarios;
                }
            }
        }
        return $array;
    }

    function remove($id) {
        $resultado = 0;
        if($this->db->connect()) {
            $sql = 'delete from usuario where id = :id';
            $array = array('id' => $id);
            if($this->db->execute($sql, $array)) {
                $resultado = $this->db->getSentence()->rowCount();
            }
        }
        return $resultado;
    }
}