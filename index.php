<?php

require_once  __DIR__ . DS . 'bootstrap.php';
$request = ((PHP_SAPI === 'cli')  ? $argv[1]: $_SERVER['REQUEST_URI']);

//Detect development server
if (strpos($_SERVER['SERVER_SOFTWARE'], 'Development Server') !== false) {
    $basepath = substr($_SERVER['DOCUMENT_ROOT'], 3);
    $request = str_replace($basepath, '', $request);
}

$path = $router->match($request);

if ($path === null) {
    $path = array('404.php');
    header("HTTP/1.0 404 Not Found");
}

$z = include 'z' . DS . implode(DS,  $path);

echo <<<Z
<!doctype html>
{$z}
Z;
