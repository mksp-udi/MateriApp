<?php

class Solicitudes
{
    private $id;
    private $usuarioid;
    private $estado;
    private $fechaSolicitud;
    private $aprobadoPor;
    private $motivoRechazo;

    public function __construct($id = null, $usuarioid = null, $estado = null, $fechaSolicitud = null, $aprobadoPor = null, $motivoRechazo = null)
    {
        $this->id = $id;
        $this->usuarioid = $usuarioid;
        $this->estado = $estado;
        $this->fechaSolicitud = $fechaSolicitud;
        $this->aprobadoPor = $aprobadoPor;
        $this->motivoRechazo = $motivoRechazo;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getUsuario_id()
    {
        return $this->usuarioid;
    }

    public function setUsuario_id($usuarioid)
    {
        $this->usuarioid = $usuarioid;
        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
        return $this;
    }

    public function getFechaSolicitud()
    {
        return $this->fechaSolicitud;
    }

    public function setFechaSolicitud($fechaSolicitud)
    {
        $this->fechaSolicitud = $fechaSolicitud;
        return $this;
    }

    public function getAprobadoPor()
    {
        return $this->aprobadoPor;
    }

    public function setAprobadoPor($aprobadoPor)
    {
        $this->aprobadoPor = $aprobadoPor;
        return $this;
    }

    public function getMotivoRechazo()
    {
        return $this->motivoRechazo;
    }

    public function setMotivoRechazo($motivoRechazo)
    {
        $this->motivoRechazo = $motivoRechazo;
        return $this;
    }
}

?>