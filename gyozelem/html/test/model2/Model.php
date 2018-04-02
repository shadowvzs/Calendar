<?php
session_start();

header('Content-Type: application/json');

$MYSQL_CONFIG = [
	"HOST" => 'localhost',//getenv('IP'),
	"USER" => 'root',//getenv('C9_USER'),
	"PASSWORD" => 'root',
	"DATABASE" => "kovacscsaba"
];

//public static
$PATTERN = [
	'EMAIL' => '/^([a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$)$/',
	'NAME_HUN' => '/^([a-zA-Z0-9 ÁÉÍÓÖŐÚÜŰÔÕÛáéíóöőúüűôõû]+)$/',
	'NAME' => '/^([a-zA-Z0-9 ]+)$/',
	'INTEGER' => '/^([0-9]+)$/',
	'SLUG' => '/^[a-zA-Z0-9-_]+$/',
	'ALPHA_NUM' => '/^([a-zA-Z0-9]+)$/',
	'STR_AND_NUM' => '/^([0-9]+[a-zA-Z]+|[a-zA-Z]+[0-9]+|[a-zA-Z]+[0-9]+[a-zA-Z]+)$/',
	'LOWER_UPPER_NUM' => '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/',
];
	
$hash = getParam('hash', "");
if (isset($_SESSION[$hash])) {
	$auth = ['hash' => $hash, 'role' => $_SESSION[$hash]['role_id']];
} else {
	$auth = ['hash' => '', 'role' => 0];
}

$class = ucfirst(strtolower(getParam('model', false)));
$method = getParam('action', false);
$data = $_POST['param'];
$path = "./".$class.".php";

if (!$class || !$method || !file_exists($path)) {
	refuseData("Incorrect data", $auth);
}


spl_autoload_register(function ($class) {
    include "./".$class.".php";
});

$model = new $class();

if (!method_exists($model, $method)) {
	refuseData("Handler not exist", $auth);
}

echo json_encode([
	"data" => [
		"modelData" => $model->$method($data),
	], 
	"success" => true, 
	"auth" => $auth
]);

function getParam($str, $default=""){
	if ( strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
		return (!empty($_POST[$str]) && validateString($_POST[$str], 'SLUG')) ? $_POST[$str] : $default;
	}else{
		return (!empty($_GET[$str]) && validateString($_GET[$str], 'SLUG')) ? $_GET[$str] : $default;
	}
}


function validateString($str, $type) {
	global $PATTERN;
	return preg_match($PATTERN[$type], htmlspecialchars(trim($str), ENT_QUOTES));
}


function refuseData($str, $auth){
	die(json_encode(["data" => ["modelData" => null], "success" => false, "error" => $str, "auth" => $auth]));
}
?>