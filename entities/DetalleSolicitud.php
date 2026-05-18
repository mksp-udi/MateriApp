<?php

    class DetalleSolicitud
    {
        private $id;
        private $solicitudId;
        private $inventarioId;
        private $cantidad;
        private $observaciones;
        
        public function __construct($id = null, $solicitudId = null, $inventarioId = null, $cantidad = null, $observaciones = null)
        {
            $this->id = $id;
            $this->solicitudId = $solicitudId;
            $this->inventarioId = $inventarioId;
            $this->cantidad = $cantidad;
            $this->observaciones = $observaciones;
        }

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function getSolicitudId()
        {
            return $this->solicitudId;
        }

        public function setSolicitudId($solicitudId)
        {
            $this->solicitudId = $solicitudId;
        }

        public function getInventarioId()
        {
            return $this->inventarioId;
        }

        public function setInventarioId($inventarioId)
        {
            $this->inventarioId = $inventarioId;
        }

        public function getCantidad()
        {
            return $this->cantidad;
        }

        public function setCantidad($cantidad)
        {
            $this->cantidad = $cantidad;
        }

        public function getObservaciones()
        {
            return $this->observaciones;
        }

        public function setObservaciones($observaciones)
        {
            $this->observaciones = $observaciones;
        }
    }

?>