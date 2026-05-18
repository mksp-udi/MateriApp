<?php

    require_once "core/BaseDatos.php";
    require_once "entities/CedulasAdmin.php";

    class CedulasAdminModel {
        private $conexion;

        public function __construct(){
            $this->conexion = (new Conectar())->conexion();
        }

        public function findById($id){
            try{
                $sql = "SELECT * FROM cedulas_admin WHERE id = :id";				
                $sentencia = $this->conexion->prepare($sql);
                $sentencia->bindParam(':id', $id);						
                $sentencia->execute();			
                $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);	
                if($resultado){ 
                    $cedulaAdmin = new CedulasAdmin($resultado['id'], $resultado['nombre'], $resultado['apellido'], $resultado['cedula']);
                    return $cedulaAdmin;
                }else{
                    return null;
                }
            }catch(Exception $e){
                die($e->getMessage());
            }
        }    
        public function findAll(){
            try{           
                $sql = "SELECT * FROM cedulas_admin"; 
                $consulta =  $this->conexion->prepare($sql);
                $consulta->execute();	
                $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);                           
                $lista = [];
                foreach ($resultados as $fila) {
                    $cedulaAdmin = new CedulasAdmin($fila['id'], $fila['nombre'], $fila['apellido'], $fila['cedula']);
                    $lista[] = $cedulaAdmin;
                }
                return $lista;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function create(CedulasAdmin $cedulaAdmin){
            try{
                $sql = "INSERT INTO cedulas_admin (nombre, apellido, cedula) VALUES (:nombre, :apellido, :cedula)";
                $sentencia = $this->conexion->prepare($sql);	
                $sentencia->bindValue(':nombre', $cedulaAdmin->getNombre());
                $sentencia->bindValue(':apellido', $cedulaAdmin->getApellido());
                $sentencia->bindValue(':cedula', $cedulaAdmin->getCedula());

                return $sentencia->execute();
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
    }
?>