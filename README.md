# Colores

#es-Es una aplicación que permite crear sistemas administrativos de forma simple en abse a la estructura de la base de datos
 
#en-Is an application that allows you to create administrative systems in a simple way based on the structure of the database

#es-Intalación

1. Configurar el archivo ./protected/config/data.php

En este archivo se debera configurar las rutas y accesos a la base de datos

2. Dar permisos para escritura en la carpeta structure que se localiza en  //<domain>/<directory>/includes/structure

3. Ejecutar el //<domain>/<directory>/includes/ajax/createStructure.php

4. Para el diseño deberá de existir una carpeta llamada design en la siguiente ruta //<domain>/<directory>/design

5. En cuya ruta habra una carpeta por diseño nuevo implementado ejemplo diseño 1 estaria en //<domain>/<directory>/design/1

    Nota: Aqui la ruta para descargar el diseño que ya se encuentran implmentados y que se pueden utilizar 

    https://framework.dixi-project./design/1.zip

6. Para crear un módulo nuevo habra que agregar un archivo en la siguiente ruta //<domain>/<directory>/protected/controller/ con el siguiente formato 

    Controller<NombredelControler>.php 
    Ejemplo si quicieramos crear una ruta llamada 
    //<domain>/<directory>/micontrolernuevo
    ControllerMicontrolernuevo.php

    ejemplo:

```
<?php
class ControllerMicontrolernuevo extends Controller {
    function __construct($view, $conf, $var, $acc) {
        parent::__construct($view, $conf, $var, $acc);
    }
        public function main() {
                foreach ($this->var as $key => $value) {
            $this->data[$key] = $value;
        }
        indexModel::bd($this->conf)->controlAcceso(["1","2"]);
        $this->view->show("home.html", $this->data, $this->accion);
    }
}
?>
```
7. Sobre El API

Los servicios son los solicitados 

GET /colores

GET /colores/:id

POST /colores

PUT /colores/:id

DELETE /colores/:id

Solo que como url pueden pasarse 2 parametro extras para la paginación

ejemplo en el local

http://localhost/colores/v1/colores?items=3&page=3

Donde ITEMS es para el número de registros  default = 6
Donde PAGE si queremos un número de página  default = 1

Losvalores por default son 

para el typo lo agregure como paramtro de tipo header solo para usar headers 

el valor que recibe es XML o JSON 
return = json o return = xml si no semanda nada es JSON 


