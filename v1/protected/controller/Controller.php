<?php
class Controller{
    public $view;
    public $conf;
    public $var;
    public $data;

    function __construct($conf, $var, $acc) {
        //require 'vendor/autoload.php';
        $this->conf = $conf;
        $this->var = $var;
        $this->accion = $acc;
        $this->data = null;
        date_default_timezone_set($conf['timezone']);
    }

    function validateUser($email,$pass){
        $dat=0;
        $ss = "SELECT a.*, count(*)as nr, b.rol FROM usuarios as a INNER JOIN rol as b ON a.rol_id=b.id WHERE a.email = '" . $email . "' AND a.password=MD5('" . $pass . "') AND status_id = 1 GROUP BY id";
        $dat = indexModel::bd($this->conf)->getSQL($ss)[0];
        return $dat;
    }
}
?>
