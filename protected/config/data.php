<?php
$debug = false;
if(@$_SERVER["SERVER_NAME"]=="localhost"){
    $debug = true;
}
if($debug){ 
    return array(
        'title'=>'Colores',
        'connectionString' => 'mysql',
        'host' => 'localhost',
        'dbname' => 'db_colores', 
        'username' => 'admin',
        'password' => 'JZ5Nb{q!.@63w',
        'folderControladores' => 'protected/controller/',
        'folderModelos' => 'protected/model/',
        'folderVistas' => 'protected/views/',
        'pathSite' => 'http://'.$_SERVER["SERVER_NAME"].'/colores/',
        'pathCMSSite' => 'http://'.$_SERVER["SERVER_NAME"].'/colores/',
        'design' => '1',   
        'timezone' => 'America/Mexico_City',
        'createby' => 'Create By Dixi Project'
    );
} else {
    return array(

        'title'=>'Colores',
        'connectionString' => 'mysql',
        'host' => 'localhost',
        'dbname' => 'dixiproj_framework',
        'username' => 'dixiproj_usrFra',
        'password' => '{0ziJHCWb-fk',
        'folderControladores' => 'protected/controller/',
        'folderModelos' => 'protected/model/',
        'folderVistas' => 'protected/views/',
        'pathSite' =>    'https://framework.dixi-project.com/',
        'pathCMSSite' => 'https://framework.dixi-project.com/admin/',
        'design' => '1',
        'timezone' => 'America/Mexico_City',
        'createby' => 'Create By Dixi Project'
    );
}
?>
