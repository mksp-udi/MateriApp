<?php

    require_once "entities/Inventario.php";
    require_once "Model/inventarioModel.php";

    class InventarioController {
        private $modelo_inventario;

        public function __construct(){
            $this->modelo_inventario = new InventarioModel();
        }

        public function index(){
            $datos = $this->modelo_inventario->findAll();
            /// var_dump($datos);
            /// require_once "View/inventario/index.php";
        }

        public function detalle($id){
            $datos = $this->modelo_inventario->findById($id);
            /// var_dump($datos);
            /// require_once "View/inventario/detalle.php";
        }

        public function nuevo(){
            /// require_once "View/inventario/nuevo.php";
        }

        public function createInventario(){
            if(
                isset($_POST["nombre"]) && !empty(trim($_POST["nombre"])) &&
                isset($_POST["cantidad"]) && !empty(trim($_POST["cantidad"])) &&
                isset($_POST["descripcion"]) && !empty(trim($_POST["descripcion"]))
            ){

                $nombre = trim($_POST["nombre"]);
                $cantidad = trim($_POST["cantidad"]);
                $descripcion = trim($_POST["descripcion"]);

                $inventario = new Inventario(null, $nombre, $cantidad, $descripcion);

                $rta = $this->modelo_inventario->create($inventario);

                if($rta){
                    $_SESSION['msg'] = "Guardado correctamente";
                    $_SESSION['tipo'] = "success";
                } else {
                    $_SESSION['msg'] = "Error al guardar";
                    $_SESSION['tipo'] = "danger";
                }    
                header("Location:".BASE_URL."inventario");
            }

        }

    }

?>