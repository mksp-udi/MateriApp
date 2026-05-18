<?php

require_once "core/BaseDatos.php";
require_once "entities/Solicitudes.php";

class SolicitudesModel {
    private $conexion;

    public function __construct(){
        $this->conexion = (new Conectar())->conexion();
    }

    public function findById($id){
        try{
            $sql = "SELECT * FROM solicitudes WHERE id = :id";				
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(':id', $id);						
            $sentencia->execute();			
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);	
            if($resultado){ 
                $solicitud = new Solicitudes($resultado['id'], $resultado['usuarioid'], $resultado['estado'], $resultado['fechaSolicitud'], $resultado['aprobadoPor'], $resultado['motivoRechazo']);
                return $solicitud;
            }else{
                return null;
            }
        }catch(Exception $e){
            die($e->getMessage());
        }
    }    
    public function findAll(){
        try{           
            $sql = "SELECT * FROM solicitudes"; 
            $consulta =  $this->conexion->prepare($sql);
            $consulta->execute();	
            $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);                           
            $lista = [];
            foreach ($resultados as $fila) {
                $solicitud = new Solicitudes($fila['id'], $fila['usuarioid'], $fila['estado'], $fila['fechaSolicitud'], $fila['aprobadoPor'], $fila['motivoRechazo']);
                $lista[] = $solicitud;
            }
            return $lista;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function create(Solicitudes $solicitud){
        try{
            $sql = "INSERT INTO solicitudes (usuarioid, estado, fechaSolicitud) VALUES (:usuarioid, :estado, :fechaSolicitud)";
            $sentencia = $this->conexion->prepare($sql);	
            $sentencia->bindValue(':usuarioid', $solicitud->getUsuario_id());
            $sentencia->bindValue(':estado', $solicitud->getEstado());
            $sentencia->bindValue(':fechaSolicitud', $solicitud->getFechaSolicitud());
            $sentencia->execute();
            return 1;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}