<?php

require_once  __DIR__ . '/bootstrap.php';
$request = ((PHP_SAPI === 'cli')  ? $argv[1]: $_SERVER['REQUEST_URI']);
$path = $router->match($request);
if ($path === null) {
  $path = array('404.php');
  header("HTTP/1.0 404 Not Found");
}

$z = include 'z/' . implode('/',  $path);

echo <<<Z
<!doctype html>
{$z}

Z;
