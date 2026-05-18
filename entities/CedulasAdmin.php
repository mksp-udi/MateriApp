<?php

class CedulasAdmin
{
    private $cedula_id;
    private $cedula;
    private $nombre;
    private $activa;

    public function __construct($cedula_id = null, $cedula = null, $nombre = null, $activa = null)
    {
        $this->cedula_id = $cedula_id;
        $this->cedula = $cedula;
        $this->nombre = $nombre;
        $this->activa = $activa;
    }

    public function getCedula_id()
    {
        return $this->cedula_id;
    }

    public function setCedula_id($cedula_id)
    {
        $this->cedula_id = $cedula_id;
        return $this;
    }

    public function getCedula()
    {
        return $this->cedula;
    }

    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getActiva()
    {
        return $this->activa;
    }

    public function setActiva($activa)
    {
        $this->activa = $activa;
        return $this;
    }
}