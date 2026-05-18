<?php

class HistorialMov
{
    private $id;
    private $solicitud_id;
    private $usuario_id;
    private $accion;
    private $fechaAccion;
    private $estadoAnterior;
    private $estadoNuevo;

    public function __construct($id, $solicitud_id, $usuario_id, $accion, $fechaAccion, $estadoAnterior, $estadoNuevo)
    {
        $this->id = $id;
        $this->solicitud_id = $solicitud_id;
        $this->usuario_id = $usuario_id;
        $this->accion = $accion;
        $this->fechaAccion = $fechaAccion;
        $this->estadoAnterior = $estadoAnterior;
        $this->estadoNuevo = $estadoNuevo;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getSolicitud_id()
    {
        return $this->solicitud_id;
    }

    public function setSolicitud_id($solicitud_id)
    {
        $this->solicitud_id = $solicitud_id;
    }

    public function getUsuario_id()
    {
        return $this->usuario_id;
    }

    public function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

    public function getAccion()
    {
        return $this->accion;
    }

    public function setAccion($accion)
    {
        $this->accion = $accion;
    }

    public function getFechaAccion()
    {
        return $this->fechaAccion;
    }

    public function setFechaAccion($fechaAccion)
    {
        $this->fechaAccion = $fechaAccion;
    }

    public function getEstadoAnterior()
    {
        return $this->estadoAnterior;
    }

    public function setEstadoAnterior($estadoAnterior)
    {
        $this->estadoAnterior = $estadoAnterior;
    }

    public function getEstadoNuevo()
    {
        return $this->estadoNuevo;
    }

    public function setEstadoNuevo($estadoNuevo)
    {
        $this->estadoNuevo = $estadoNuevo;
    }
}
?>