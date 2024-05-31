<?php
ob_start();
$microtime=microtime(true);
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');

include 'includes.php';

//make path an array
$return = ['message'=>'', 'warning'=>'', 'debug'=>[], 'data'=>[], 'log'=>[] ];
$path = $_SERVER['REQUEST_URI'];

$path = explode( '?', $path)[0]; //omit GET parameters
$path = explode( '//', $path); //get parameters after the "//"
if (isset ($path[1])){ //if there are any parameters ...
    $paras = explode('/', $path[1]); //...transform them to an array...
}
else{
    $paras = []; //...or else just set an empty array
}
$path = $path[0];

$path = substr($path, strlen(PATH)+1);
$method = $_SERVER['REQUEST_METHOD'];
if (DEBUG)
{
    $return['log']['method'] = $method;
    $return['log']['input'] = file_get_contents("php://input");
}

$user = get_user();

$data = json_decode(file_get_contents("php://input"), TRUE);

//  is_dir ( string $filename ) : bool — Prüft, ob der angegebene Dateiname ein Verzeichnis ist
// file_exists ( string $filename ) : bool
// Check file, check folder, Pass rest to function

include_once 'routes/'.$path.'.php';
terminate();
?>