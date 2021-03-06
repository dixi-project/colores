<?php
defined('DIXI_PATH') or define('DIXI_PATH', dirname(__FILE__));
class DIXIBASE {
    public static function crearAplicacionWeb($config = null) {
        return self::crearAplicacion('CREARWEB', $config);
    }

    public static function crearAplicacion($class, $config = null) {
        return new $class($config);
    }

    private static function getFrameworkPath() {
        return DORG_PATH;
    }

    public static function autoload($className) {
        // --> Incluyen el uso para que el archivo de error de PHP puede aparecer
        if (isset(self::$_coreClasses[$className]))
            include(DORG_PATH . self::$_coreClasses[$className]);
        else {
            include(self::$_coreClasses['class' . $className]);
            return class_exists($className, false) || interface_exists($className, false);
        }
        return true;
    }
    
    private static $_coreClasses = array(
        'classCREARWEB' => 'CREARWEB.php', //Crea la página web
        'classCatalogos' => 'catalogos/catalogos.php'
    );
}
spl_autoload_register(array('DIXIBASE', 'autoload'));
?>