<?php

class Alumno {
    
    use Comun;
    
    private $apellidos,
            $dni,
            $fechaNacimiento,
            $nombre,
            $numeroMatricula,
            $sexo,
            $telefono;

    function __construct($dni = null, $nombre = null, $apellidos = null , $numeroMatricula = null , $fechaNacimiento = null,$sexo = null , $telefono = null) {
        $this->apellidos= $apellidos;
        $this->dni= $dni;
        $this->fechaNacimiento= $fechaNacimiento;
        $this->nombre= $nombre;
        $this->numeroMatricula= $numeroMatricula;
        $this->sexo= $sexo;
        $this->telefono= $telefono;
        
    }

    function __toString() {
        return  'El alumno es :'.$this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getDni() {
        return $this->dni;
    }

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getNumeroMatricula() {
        return $this->numeroMatricula;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function properties() {
        $array = array();
        foreach ($this as $property => $value) {
            $array[$property] = null;
        }
        return $array;
    }

    function set(array $array) {
        foreach ($this as $property => $value) {
            if(isset($array[$property])) {
                $this->$property = $array[$property];
            } else {
                $this->$property = null;
            }
        }
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

    function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setNumeroMatricula($numeroMatricula) {
        $this->numeroMatricula = $numeroMatricula;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }


}