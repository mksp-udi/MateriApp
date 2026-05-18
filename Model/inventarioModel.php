<?php

    require_once "core/BaseDatos.php";
    require_once "entities/Inventario.php";

    class InventarioModel {
        private $conexion;

        public function __construct(){
            $this->conexion = (new Conectar())->conexion();
        }

        public function findById($id){
            try{
                $sql = "SELECT * FROM inventario WHERE id = :id";				
                $sentencia = $this->conexion->prepare($sql);
                $sentencia->bindParam(':id', $id);						
                $sentencia->execute();			
                $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);	
                if($resultado){ 
                    $inventario = new Inventario($resultado['id'], $resultado['nombre'], $resultado['cantidad'], $resultado['descripcion']);
                    return $inventario;
                }else{
                    return null;
                }
            }catch(Exception $e){
                die($e->getMessage());
            }
        }    
        public function findAll(){
            try{           
                $sql = "SELECT * FROM inventario"; 
                $consulta =  $this->conexion->prepare($sql);
                $consulta->execute();	
                $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);                           
                $lista = [];
                foreach ($resultados as $fila) {
                    $inventario = new Inventario($fila['id'], $fila['nombre'], $fila['cantidad'], $fila['descripcion']);
                    $lista[] = $inventario;
                }
                return $lista;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function create(Inventario $inventario){
            try{
                $sql = "INSERT INTO inventario (nombre, cantidad, descripcion) VALUES (:nombre, :cantidad, :descripcion)";
                $sentencia = $this->conexion->prepare($sql);	
                $sentencia->bindValue(':nombre', $inventario->getNombre());
                $sentencia->bindValue(':cantidad', $inventario->getCantidad());
                $sentencia->bindValue(':descripcion', $inventario->getDescripcion());

                return $sentencia->execute();
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
    }
?>