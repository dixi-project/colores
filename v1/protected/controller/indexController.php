<?php
class indexController {
    function __construct($conf, $var, $acc) {
        $this->conf = $conf;
        $this->var = $var;
        $this->accion = $acc;
    } 
    public function main() {
        $array=array(
            "API"=>indexModel::bd($this->conf)->getMensajeApi()
            );
        indexModel::bd($this->conf)->setJsonV1(TRUE,$array);
    }
}
?>