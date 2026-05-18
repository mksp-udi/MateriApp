<?php

    require_once "core/BaseDatos.php";
    require_once "entities/HistorialMov.php";

    class HistorialMovModel {
        private $conexion;

        public function __construct(){
            $this->conexion = (new Conectar())->conexion();
        }

        public function findById($id){
            try{
                $sql = "SELECT * FROM historial_mov WHERE id = :id";				
                $sentencia = $this->conexion->prepare($sql);
                $sentencia->bindParam(':id', $id);						
                $sentencia->execute();			
                $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);	
                if($resultado){ 
                    $historialMov = new HistorialMov($resultado['id'], $resultado['solicitud_id'], $resultado['fecha_mov'], $resultado['tipo_mov']);
                    return $historialMov;
                }else{
                    return null;
                }
            }catch(Exception $e){
                die($e->getMessage());
            }
        }    
        public function findAll(){
            try{           
                $sql = "SELECT * FROM historial_mov"; 
                $consulta =  $this->conexion->prepare($sql);
                $consulta->execute();	
                $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);                           
                $lista = [];
                foreach ($resultados as $fila) {
                    $historialMov = new HistorialMov($fila['id'], $fila['solicitud_id'], $fila['fecha_mov'], $fila['tipo_mov']);
                    $lista[] = $historialMov;
                }
                return $lista;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function create(HistorialMov $historialMov){
            try{
                $sql = "INSERT INTO historial_mov (solicitud_id, fecha_mov, tipo_mov) VALUES (:solicitud_id, :fecha_mov, :tipo_mov)";
                $sentencia = $this->conexion->prepare($sql);	
                $sentencia->bindValue(':solicitud_id', $historialMov->getSolicitudId());
                $sentencia->bindValue(':fecha_mov', $historialMov->getFechaMov());
                $sentencia->bindValue(':tipo_mov', $historialMov->getTipoMov());

                return $sentencia->execute();
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
    }
?>