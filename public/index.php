<?php

declare(strict_types=1);

// start session if session is possible and no session is already started
if( session_status() === PHP_SESSION_NONE ){
    session_start();
}

$url = $_SERVER["REQUEST_URI"];
$args = explode('/', $url);
// var_dump($args);


array_shift($args); // '/'
array_shift($args); // index.php
$controllerName = array_shift($args) ?? 'article';
$functionName = array_shift($args) ?? 'Index';

if($controllerName == "") {
    $controllerName = 'article';
}
if($functionName == "") {
    $functionName = 'Index';
}

$id = array_shift($args) ?? 0;

// var_dump($controllerName);
// var_dump($functionName);
// var_dump($id);

$functionName = $controllerName.ucfirst( $functionName );

require '../src/controller/controller-'.$controllerName.'.php';
// call_user_func_array($functionName, $args);
// $functionName(extract($args));
$functionName( (int) $id);