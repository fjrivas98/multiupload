<?php

namespace izv\managedata;

use \izv\data\Usuario;
use \izv\database\Database;
use izv\tools\Util;

class ManageUsuario {

    private $db;

    function __construct(Database $db) {
        $this->db = $db;
    }

    //id, correo, alias, nombre , clave, activo, fechaalta
    //:id, :correo, :alias, :nombre , :clave, :activo, :fechaalta
    function add(Usuario $usuario) {
        $resultado = 0;
        if($this->db->connect()) {
            $sql = 'insert into usuario values(:id, :correo, :alias, :nombre , :clave, :activo, :fechaalta,:admin)';
            if($this->db->execute($sql, $usuario->get())) {
                $resultado = $this->db->getConnection()->lastInsertId();
            }
        }
        return $resultado;
    }

    function edit(Usuario $usuario) {
        $resultado = 0;
        if($this->db->connect()) {
            $sql = 'update usuario set correo = :correo, alias = :alias, nombre = :nombre, activo = :activo, admin = :admin where id = :id';
            $array = $usuario->get();
            unset($array['clave']);
            unset($array['fechaalta']);
            if($this->db->execute($sql, $array)) {
                $resultado = $this->db->getSentence()->rowCount();
            }
        }
        return $resultado;
    }

    function editWithPassword(Usuario $usuario) {
        $resultado = 0;
        if($this->db->connect()) {
            $sql = 'update usuario set correo = :correo, alias = :alias, nombre = :nombre , clave = :clave, activo = :activo, administrador = :administrador where id = :id';
            $array = $usuario->get();
            unset($array['fechaalta']);
            if($this->db->execute($sql, $array)) {
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
                    $usuario = new Usuario();
                    $usuario->set($fila);
                }
            }
        }
        return $usuario;
    }
    /*
    Login: Devuelve el usuario si todo esta bien, si no devuelve false
    */
    function login($correo, $clave) {
        if($this->db->connect()) {
            $sql = 'select * from usuario where correo = :correo and activo=1';
            $array = array('correo' => $correo);
            if($this->db->execute($sql, $array)) {
                if($fila = $this->db->getSentence()->fetch()) {
                    $usuario = new Usuario();
                   
                    $usuario->set($fila);
                     echo '<pre> el usuario' . var_export($usuario, true) . '</pre>';
                     
                   // $resultado = \izv\tools\Util::verificarClave($clave, $usuario->getClave());
                   $resultado = false;
                   if($clave == $usuario->getClave()){
                       $resultado = true;
                   }
                   echo '<pre> resultado' . var_export($resultado, true) . '</pre>';
                    
                      echo '<pre> verificacion' . var_export($usuario->getClave(), true) . '</pre>';
                      
                     echo '<pre> verificacion' . var_export($resultado, true) . '</pre>';
                    if($resultado){
                        $usuario->setClave(''); //para que el campo clave no este por ahi de parranda circulando
                        return $usuario;
                        
                    }
                }
            }
        }
       
        return false;// false o usuario logeado
    }

    function getAll() {
        $array = array();
        if($this->db->connect()) {
            $sql = 'select * from usuario order by nombre';
            if($this->db->execute($sql)) {
                while($fila = $this->db->getSentence()->fetch()) {
                    $usuario = new Usuario();
                    $usuario->set($fila);
                    $array[] = $usuario;
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