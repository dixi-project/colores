<?php
ini_set('display_errors',0);
error_reporting(E_ALL); 
class ControllerColores extends Controller{
    function __construct($conf, $var, $acc) {
        parent::__construct($conf, $var, $acc); 
    }
    public function main() {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        foreach($this->var as $k => $v){
            $$k=$v;
        }
        $rawdata = file_get_contents("php://input");
        $decoded = json_decode($rawdata);
        //var_dump($decoded);
        foreach (getallheaders() as $nombre => $valor) {
            //echo "$nombre: $valor\n";
        }
        $dat = explode("/",$con);
        $error=TRUE;
        $success=FALSE;
        $array=array("Servicio-API"=>"Multiplicatalent Colores","message"=>indexModel::bd($this->conf)->getMensajeApi(""),"new"=>0);
        $res = indexModel::bd($this->conf)->validarAcceso($_SERVER['PHP_AUTH_USER'],$_SERVER['PHP_AUTH_PW']);
        $dd=explode("|",$res);
        if($_SERVER['REQUEST_METHOD'] != "GET" && $dd[1]==2){
            $mensaje = indexModel::bd($this->conf)->getMensajeApi("errorUserMethod");
            $array=array(
                "success"=>$success,
                "message"=>$mensaje
            );
        }else{
            if($dd[0] > 0){
                $success=TRUE;
                $error=FALSE;
                // --> Si borrar
                if($_SERVER['REQUEST_METHOD'] == "DELETE" && $dd[1]==1){
                    indexModel::bd($this->conf)->deleteDominio("color",$dat[1]);
                    $mensaje = indexModel::bd($this->conf)->getMensajeApi("successDelete");
                    $array=array(
                        "success"=>$success,
                        "message"=>$mensaje
                    );
                }else{
                    $colores = indexModel::bd($this->conf)->getDominio("color");
                    if($dat[1]>0){
                        $colores = indexModel::bd($this->conf)->getDominio("color",$dat[1]);
                    }
                    $mensaje = indexModel::bd($this->conf)->getMensajeApi("success");
                    if(count($colores)>0){
                        $array=array(
                            "success"=>$success,
                            "data"=> $colores,
                            "message"=>$mensaje
                        );
                    }else{
                        $mensaje = indexModel::bd($this->conf)->getMensajeApi("errorIDrow");
                        $success=FALSE;
                        $error=TRUE;
                        $array=array(
                            "success"=>$success,
                            "message"=>$mensaje
                        );
                    }
                }
            }else{
                $mensaje = indexModel::bd($this->conf)->getMensajeApi("errorUser");
                $array=array(
                    "success"=>$success,
                    "message"=>$mensaje
                );
            }
        }
        
        indexModel::bd($this->conf)->setJsonV1($error,$array);
        
    }
}   
?>