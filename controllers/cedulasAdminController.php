<?php

    require_once "entities/CedulasAdmin.php";
    require_once "Model/cedulasAdminModel.php";

    class CedulasAdminController {
        private $modelo_cedulasAdmin;

        public function __construct(){
            $this->modelo_cedulasAdmin = new CedulasAdminModel();
        }

        public function index(){
            $datos = $this->modelo_cedulasAdmin->findAll();
            /// var_dump($datos);
            /// require_once "View/cedulasAdmin/index.php";
        }

        public function detalle($id){
            $datos = $this->modelo_cedulasAdmin->findById($id);
            /// var_dump($datos);
            /// require_once "View/cedulasAdmin/detalle.php";
        }

        public function nuevo(){
            /// require_once "View/cedulasAdmin/nuevo.php";
        }
        

        public function createccAdmin(){
            if(
                isset($_POST["nombre"]) && !empty(trim($_POST["nombre"])) &&
                isset($_POST["apellido"]) && !empty(trim($_POST["apellido"])) &&
                isset($_POST["cedula"]) && !empty(trim($_POST["cedula"]))
            ){

                $nombre = trim($_POST["nombre"]);
                $apellido = trim($_POST["apellido"]);
                $cedula = trim($_POST["cedula"]);

                $ccAdmin = new CedulasAdmin(null, $nombre, $apellido, $cedula);

                $rta = $this->modelo_ccAdmin->create($ccAdmin);

                if($rta){
                    $_SESSION['msg'] = "Guardado correctamente";
                    $_SESSION['tipo'] = "success";
                } else {
                    $_SESSION['msg'] = "Error al guardar";
                    $_SESSION['tipo'] = "danger";
                }    
                header("Location:".BASE_URL."ccAdmin");
            }
        }
    }
?>
