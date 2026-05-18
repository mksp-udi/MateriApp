<?php
require_once 'entities/Usuarios.php';
require_once 'Model/usuariosModel.php';

class UsuariosController {

    private $modelo_usuarios;

    public function __construct(){
        //parent::__construct();
        
        $this->modelo_usuarios = new UsuariosModel();
        
    }    

    //get
    public function inicio(){
        $lista_usuarios = $this->modelo_usuarios->findAll();
        /// require_once "View/usuarios/---.php";
    }

    public function nuevo(){
        /// require_once "View/usuarios/nuevo.php";
    }

    public function detalle($id){
        $datos = $this->modelo_usuarios->findById($id);
        /// var_dump($datos);
        /// require_once "View/usuarios/detalle.php";
    }

    //post
    public function createUsuario(){
        if(
            isset($_POST["nombresCompletos"]) && !empty(trim($_POST["nombresCompletos"])) &&
            isset($_POST["celular"]) && !empty(trim($_POST["celular"])) &&
            isset($_POST["rol"]) && !empty(trim($_POST["rol"])) &&
            isset($_POST["correo"]) && !empty(trim($_POST["correo"])) &&
            isset($_POST["contrasena"]) && !empty(trim($_POST["contrasena"]))
        ){

            $nombresCompletos = trim($_POST["nombresCompletos"]);
            $celular = trim($_POST["celular"]);
            $rol = trim($_POST["rol"]);
            $correo = trim($_POST["correo"]);
            $contrasena = trim($_POST["contrasena"]);
            $fechaRegistro = date("Y-m-d H:i:s");
            $usuario = new Usuarios(null, $nombresCompletos, $celular, $rol, $correo, $contrasena, $fechaRegistro);

            $rta = $this->modelo_usuarios->create($usuario);


            if($rta){
                $_SESSION['msg'] = "Guardado correctamente";
                $_SESSION['tipo'] = "success";
            } else {
                $_SESSION['msg'] = "Error al guardar";
                $_SESSION['tipo'] = "danger";
            }    
            header("Location:".BASE_URL."perfil");        
                  
        } else {
            echo "Todos los campos son obligartorios";
        } 
        
    }

    public function updateUsuario(){
        
    }

    public function deleteUsuario(){
        
    }


    


}