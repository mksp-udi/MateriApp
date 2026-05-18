<?php

class Inventario
{
    private $herramienta_id;
    private $nombre;
    private $marca;
    private $referencia;
    private $codigoProducto;
    private $cantidad;
    private $bodega;
    private $codigoBodega;

    public function __construct($herramienta_id = null, $nombre = null, $marca = null, $referencia = null, $codigoProducto = null, $cantidad = null, $bodega = null, $codigoBodega = null)
    {
        $this->herramienta_id = $herramienta_id;
        $this->nombre = $nombre;
        $this->marca = $marca;
        $this->referencia = $referencia;
        $this->codigoProducto = $codigoProducto;
        $this->cantidad = $cantidad;
        $this->bodega = $bodega;
        $this->codigoBodega = $codigoBodega;
    }

    public function getHerramienta_id()
    {
        return $this->herramienta_id;
    }

    public function setHerramienta_id($herramienta_id)
    {
        $this->herramienta_id = $herramienta_id;
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

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
        return $this;
    }

    public function getReferencia()
    {
        return $this->referencia;
    }

    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;
        return $this;
    }

    public function getCodigoProducto()
    {
        return $this->codigoProducto;
    }

    public function setCodigoProducto($codigoProducto)
    {
        $this->codigoProducto = $codigoProducto;
        return $this;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
        return $this;
    }

    public function getBodega()
    {
        return $this->bodega;
    }

    public function setBodega($bodega)
    {
        $this->bodega = $bodega;
        return $this;
    }

    public function getCodigoBodega()
    {
        return $this->codigoBodega;
    }

    public function setCodigoBodega($codigoBodega)
    {
        $this->codigoBodega = $codigoBodega;
        return $this;
    }
}
