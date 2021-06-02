<?php
/**
   * SPDO  
	* <br>Constrola el acceso a la libreria PDO que sirve para trabajar con conexiones a bases de datos 
	* @package protected   
	* @subpackage modelos
	* @author Castillejos Sánchez José Alfredo <alfredo@expansion.com.mx>
	* @copyright Copyright (c) 2010, Grupo Expansión  
	* @category Modelo
	* @version 1.0 2010-12-10 12:55:00   
	* @license http://opensource.org/licenses/gpl-license.php GNU Public License
	* @since v 1.1 2011-03-24 07:54:00   
*/
//error_reporting (E_ALL ^ E_WARNING);
class SPDO extends PDO
{
	private static $instance = null;
	public $host;
	public $bd;
	public $user;
	public $clave;
	
	function __construct($host1,$bd1,$user1,$clave1) 
	{
            try {
				//echo $host1."--".$bd1."--".$user1."--".$clave1."<br>";
		parent::__construct('mysql:host=' . $host1 . ';dbname=' . $bd1, $user1, $clave1);
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }

	} 
/**
* Metodo singleton() que modela las funciones singleton para conexion a PDO
* Controla la pantalla de lista de ultimos comentarios
* @return Object self::$instance Consulta SQL  
*/ 
	public static function singleton($host1,$bd1,$user1,$clave1)
	{
	  $host = $host1;  
	  $bd = $bd1;
	  $user = $user1;
	  $clave = $clave1;
		if( self::$instance == null )
		{
			self::$instance = new self($host,$bd,$user,$clave);
		}
		return self::$instance;
	}
}
?>