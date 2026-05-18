<?php

    require_once "entities/HistorialMov.php";
    require_once "Model/historialMovModel.php";

    class HistorialMovController {
        private $modelo_historialMov;

        public function __construct(){
            $this->modelo_historialMov = new HistorialMovModel();
        }

        public function index(){
            $datos = $this->modelo_historialMov->findAll();
            /// var_dump($datos);
            /// require_once "View/historialMov/index.php";
        }

        public function detalle($id){
            $datos = $this->modelo_historialMov->findById($id);
            /// var_dump($datos);
            /// require_once "View/historialMov/detalle.php";
        }

        public function nuevo(){
            /// require_once "View/historialMov/nuevo.php";
        }

        public function createHistorialMov(){
            if(
                isset($_POST["movimiento"]) && !empty(trim($_POST["movimiento"])) &&
                isset($_POST["fecha"]) && !empty(trim($_POST["fecha"])) &&
                isset($_POST["usuarioid"]) && !empty(trim($_POST["usuarioid"]))
            ){

                $movimiento = trim($_POST["movimiento"]);
                $fecha = trim($_POST["fecha"]);
                $usuarioid = trim($_POST["usuarioid"]);

                $historialMov = new HistorialMov(null, $movimiento, $fecha, $usuarioid);

                $rta = $this->modelo_historialMov->create($historialMov);

                if($rta){
                    $_SESSION['msg'] = "Guardado correctamente";
                    $_SESSION['tipo'] = "success";
                } else {
                    $_SESSION['msg'] = "Error al guardar";
                    $_SESSION['tipo'] = "danger";
                }    
                header("Location:".BASE_URL."historialMov");
            }

        }

    }
?>