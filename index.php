<?php

require_once  __DIR__ . '/bootstrap.php';
$request = ((PHP_SAPI === 'cli')  ? $argv[1]: $_SERVER['REQUEST_URI']);
$r = $router->match($request);
if ($r === null) {
  $r = array('404');
  header("HTTP/1.0 404 Not Found");
}
$z = include 'z/' . implode('/',  $r) . '.php';

echo <<<Z
<!doctype html>
{$z}

Z;
