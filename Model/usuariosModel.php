<?php
require_once "core/BaseDatos.php";
require_once "entities/Usuarios.php";
class UsuariosModel extends Conectar{
    public function __construct(){
        parent::__construct();
    }
    //READ
    public function findById($id){
        try{
            $sql = "select * from usuarios where usuario_id = :id";				
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(':id', $id);						
            $sentencia->execute();			
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);	
            if($resultado){ 
                $usuario = new Usuarios($resultado['usuario_id'], $resultado['nombresCompletos'], $resultado['celular'], $resultado['rol'], $resultado['correo'], $resultado['contrasena'], $resultado['fechaRegistro']);
                return $usuario;
            }else{
                return null;
            }
        }catch(Exception $e){
            die($e->getMessage());
        }
    }    
    public function findAll(){

        try{           
            $sql = "select * from usuarios"; 
            $consulta =  $this->conexion->prepare($sql);
            $consulta->execute();	
            $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);                           
            $lista = [];
            foreach ($resultados as $fila) {
                $usuario = new Usuarios($fila['usuario_id'], $fila['nombresCompletos'], $fila['celular'], $fila['rol'], $fila['correo'], $fila['contrasena'], $fila['fechaRegistro']);
                $lista[] = $usuario;
            }
            return $lista;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    //CREATE
    public function create(Usuarios $usuario){
        try{
            $sql = "INSERT INTO usuarios (nombresCompletos, celular, rol, correo, contrasena, fechaRegistro) VALUES (:nombresCompletos, :celular, :rol, :correo, :contrasena, :fechaRegistro)";
            $sentencia = $this->conexion->prepare($sql);	
            $sentencia->bindValue(':nombresCompletos', $usuario->getNombresCompletos());
            $sentencia->bindValue(':celular', $usuario->getCelular());
            $sentencia->bindValue(':rol', $usuario->getRol());
            $sentencia->bindValue(':correo', $usuario->getCorreo());
            $sentencia->bindValue(':contrasena', $usuario->getContrasena());
            $sentencia->bindValue(':fechaRegistro', $usuario->getFechaRegistro());
            $sentencia->execute();
            $result = $this->conexion->lastInsertId();
            return $result;
        }catch(Exception $e){
            die($e->getMessage());
        }
    } 
    public function update(Usuarios $usuario){
        try{
            $sql = "UPDATE usuarios SET nombresCompletos = :nombresCompletos, celular = :celular, rol = :rol, correo = :correo, contrasena = :contrasena, fechaRegistro = :fechaRegistro WHERE usuario_id = :usuario_id";
            $sentencia = $this->conexion->prepare($sql);	
            $sentencia->bindValue(':nombresCompletos', $usuario->getNombresCompletos());
            $sentencia->bindValue(':celular', $usuario->getCelular());
            $sentencia->bindValue(':rol', $usuario->getRol());
            $sentencia->bindValue(':correo', $usuario->getCorreo());
            $sentencia->bindValue(':contrasena', $usuario->getContrasena());
            $sentencia->bindValue(':fechaRegistro', $usuario->getFechaRegistro());
            $sentencia->bindValue(':usuario_id', $usuario->getUsuario_id());
            $sentencia->execute();
            return($sentencia->rowCount() > 0) ? true : false;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }     
}    