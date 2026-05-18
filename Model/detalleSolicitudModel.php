<?php

    require_once "core/BaseDatos.php";
    require_once "entities/DetalleSolicitud.php";

    class DetalleSolicitudModel {
        private $conexion;

        public function __construct(){
            $this->conexion = (new Conectar())->conexion();
        }

        public function findById($id){
            try{
                $sql = "SELECT * FROM detalle_solicitud WHERE id = :id";				
                $sentencia = $this->conexion->prepare($sql);
                $sentencia->bindParam(':id', $id);						
                $sentencia->execute();			
                $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);	
                if($resultado){ 
                    $detalleSolicitud = new DetalleSolicitud($resultado['id'], $resultado['solicitud_id'], $resultado['inventario_id'], $resultado['cantidad']);
                    return $detalleSolicitud;
                }else{
                    return null;
                }
            }catch(Exception $e){
                die($e->getMessage());
            }
        }    
        public function findAll(){
            try{           
                $sql = "SELECT * FROM detalle_solicitud"; 
                $consulta =  $this->conexion->prepare($sql);
                $consulta->execute();	
                $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);                           
                $lista = [];
                foreach ($resultados as $fila) {
                    $detalleSolicitud = new DetalleSolicitud($fila['id'], $fila['solicitud_id'], $fila['inventario_id'], $fila['cantidad']);
                    $lista[] = $detalleSolicitud;
                }
                return $lista;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function create(DetalleSolicitud $detalleSolicitud){
            try{
                $sql = "INSERT INTO detalle_solicitud (solicitud_id, inventario_id, cantidad) VALUES (:solicitud_id, :inventario_id, :cantidad)";
                $sentencia = $this->conexion->prepare($sql);	
                $sentencia->bindValue(':solicitud_id', $detalleSolicitud->getSolicitudId());
                $sentencia->bindValue(':inventario_id', $detalleSolicitud->getInventarioId());
                $sentencia->bindValue(':cantidad', $detalleSolicitud->getCantidad());

                return $sentencia->execute();
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
    }

?>