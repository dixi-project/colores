<?php
ini_set('display_errors',0);
error_reporting(E_ALL); 
class ControllerColores extends Controller{
    function __construct($conf, $var, $acc) {
        parent::__construct($conf, $var, $acc); 
    }
    public function main() {
        foreach($this->var as $k => $v){
            $$k=$v;
        }
        $rawdata = file_get_contents("php://input");
        $decoded = json_decode($rawdata);
        //var_dump($decoded);
        foreach (getallheaders() as $nombre => $valor) {
            //echo  $nombre .'--'. $valor.PHP_EOL;
            $$nombre = $valor;
        }
        foreach ($_REQUEST as $nombre => $valor) {
            //echo  $nombre .'--'. $valor.PHP_EOL;
            $$nombre = $valor;
        }
        // --> Si no hay item definido
        if(!isset($items)){
            $items=6;
            $fin_limit=6;
        }else{
            $fin_limit=$items;
        }
        if(!isset($page)){
            $page=1;
        }
        // Valores por defaultpara  los limites 
        $inicio_limit=0;
        
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: ".$_SERVER['REQUEST_METHOD']);
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        
       
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
                    if($dat[1]>0){
                        $colores = indexModel::bd($this->conf)->getSQL("SELECT * from color WHERE id= ".$dat[1]);
                    }else{
                        if($page>1){
                            $inicio_limit=($page*$items)-$items;
                        }
                        $limit = " LIMIT $inicio_limit , $fin_limit";
                        $sql = "SELECT * from color ".$limit;
                        $sql2 = "SELECT count(*) as nr from color ";
                        $colores = indexModel::bd($this->conf)->getSQL($sql );
                        $total_elements = indexModel::bd($this->conf)->getSQL($sql2)[0];

                        $number_of_pages = ceil($total_elements->nr  / $items);
                       
                    }
                    $mensaje = indexModel::bd($this->conf)->getMensajeApi("success");
                    if(count($colores)>0){
                        $array=array(
                            "success"=>$success,
                            "data"=> $colores,
                            "actual_page"=>$page,
                            "number_of_pages"=>$number_of_pages,
                            "total_elements"=>$total_elements->nr,
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
        
        if($return=="json"){
            indexModel::bd($this->conf)->setJsonV1($error,$array);
        }else{
            indexModel::bd($this->conf)->setXMLV1($error,$array);
        }

        
        
    }
}   
?>