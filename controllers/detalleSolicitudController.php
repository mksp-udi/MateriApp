<?php

    require_once "entities/DetalleSolicitud.php";
    require_once "Model/detalleSolicitudModel.php";

    class DetalleSolicitudController {
        private $modelo_detalleSolicitud;

        public function __construct(){
            $this->modelo_detalleSolicitud = new DetalleSolicitudModel();
        }

        public function index(){
            $datos = $this->modelo_detalleSolicitud->findAll();
            /// var_dump($datos);
            /// require_once "View/detalleSolicitud/index.php";
        }

        public function detalle($id){
            $datos = $this->modelo_detalleSolicitud->findById($id);
            /// var_dump($datos);
            /// require_once "View/detalleSolicitud/detalle.php";
        }

        public function nuevo(){
            /// require_once "View/detalleSolicitud/nuevo.php";
        }

        public function createDetalleSolicitud(){
            if(
                isset($_POST["solicitudid"]) && !empty(trim($_POST["solicitudid"])) &&
                isset($_POST["inventarioid"]) && !empty(trim($_POST["inventarioid"])) &&
                isset($_POST["cantidad"]) && !empty(trim($_POST["cantidad"]))
            ){

                $solicitudid = trim($_POST["solicitudid"]);
                $inventarioid = trim($_POST["inventarioid"]);
                $cantidad = trim($_POST["cantidad"]);

                $detalleSolicitud = new DetalleSolicitud(null, $solicitudid, $inventarioid, $cantidad);

                $rta = $this->modelo_detalleSolicitud->create($detalleSolicitud);

                if($rta){
                    $_SESSION['msg'] = "Guardado correctamente";
                    $_SESSION['tipo'] = "success";
                } else {
                    $_SESSION['msg'] = "Error al guardar";
                    $_SESSION['tipo'] = "danger";
                }    
                header("Location:".BASE_URL."detalleSolicitud");
            }
        }
    }
?>