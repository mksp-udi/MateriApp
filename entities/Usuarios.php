<?php

class Usuarios
{
    private $usuario_id;
    private $nombresCompletos;
    private $celular;
    private $rol;
    private $correo;
    private $contrasena;
    private $fechaRegistro;

    public function __construct($usuario_id = null, $nombresCompletos = null, $celular = null, $rol = null, $correo = null, $contrasena = null, $fechaRegistro = null)
    {
        $this->usuario_id = $usuario_id;
        $this->nombresCompletos = $nombresCompletos;
        $this->celular = $celular;
        $this->rol = $rol;
        $this->correo = $correo;
        $this->contrasena = $contrasena;
        $this->fechaRegistro = $fechaRegistro;
    }

    public function getUsuario_id()
    {
        return $this->usuario_id;
    }

    public function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;
        return $this;
    }

    public function getNombresCompletos()
    {
        return $this->nombresCompletos;
    }

    public function setNombresCompletos($nombresCompletos)
    {
        $this->nombresCompletos = $nombresCompletos;
        return $this;
    }

    public function getCelular()
    {
        return $this->celular;
    }

    public function setCelular($celular)
    {
        $this->celular = $celular;
        return $this;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
        return $this;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
        return $this;
    }

    public function getContrasena()
    {
        return $this->contrasena;
    }

    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
        return $this;
    }

    public function getCelular()
    {
        return $this->celular;
    }

    public function setCelular($celular)
    {
        $this->celular = $celular;
        return $this;
    }

    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;
        return $this;
    }

}