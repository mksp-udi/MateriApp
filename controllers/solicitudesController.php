<?php

require_once "entities/Solicitudes.php";
require_once "Model/solicitudesModel.php";

class SolicitudesController {
    private $modelo_solicitudes;

    public function __construct(){
        $this->modelo_solicitudes = new SolicitudesModel();
    }

    public function index(){
        $datos = $this->modelo_solicitudes->findAll();
        /// var_dump($datos);
        /// require_once "View/solicitudes/index.php";
    }

    public function detalle($id){
        $datos = $this->modelo_solicitudes->findById($id);
        /// var_dump($datos);
        /// require_once "View/solicitudes/detalle.php";
    }

    public function nuevo(){
        /// require_once "View/solicitudes/nuevo.php";
    }

    public function createSolicitud(){
        if(
            isset($_POST["usuarioid"]) && !empty(trim($_POST["usuarioid"])) &&
            isset($_POST["estado"]) && !empty(trim($_POST["estado"])) &&
            isset($_POST["fechaSolicitud"]) && !empty(trim($_POST["fechaSolicitud"]))
        ){

            $usuarioid = trim($_POST["usuarioid"]);
            $estado = trim($_POST["estado"]);
            $fechaSolicitud = trim($_POST["fechaSolicitud"]);

            $solicitud = new Solicitudes(null, $usuarioid, $estado, $fechaSolicitud);

            $rta = $this->modelo_solicitudes->create($solicitud);

            if($rta){
                $_SESSION['msg'] = "Guardado correctamente";
                $_SESSION['tipo'] = "success";
            } else {
                $_SESSION['msg'] = "Error al guardar";
                $_SESSION['tipo'] = "danger";
            }    
            header("Location:".BASE_URL."solicitudes");
        }

    }

}