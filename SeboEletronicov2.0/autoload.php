<?php
set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . '/Controle');
set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . '/Modelo');
set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . '/Dao');
set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . '/Utilidades');
$allFolders = explode("\n", file_get_contents(__DIR__. '/folders.php'));
$whereToLook = array();
foreach($allFolders as $folder)
{
    $whereToLook[] = substr($folder, 2);  
}
$_GET['whereToLook'] = $whereToLook;
$_GET['base'] = __DIR__ . "/";
function my_autoload($pClassName) 
{
    $whereToLook = $_GET['whereToLook'];
    $base = $_GET['base'];
    foreach($whereToLook as $folder)
    {
        if(file_exists($base . $folder . '/' . $pClassName. '.php'))
        {
            require_once($base . $folder . '/' . $pClassName. '.php');
        }
    }
}
spl_autoload_register("my_autoload");