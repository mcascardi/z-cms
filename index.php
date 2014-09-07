<?php
/**
 * Index file
 * 
 * Loads the bootstrap file which sets the up application. Takes the
 * requested path from the server request URI or the command line and
 * outputs the content.
 *
 * PHP Version 5
 *
 * @since 0.1
 */

require_once  __DIR__ . DIRECTORY_SEPARATOR . 'bootstrap.php';
$request = ((PHP_SAPI === 'cli')  ? $argv[1]: $_SERVER['REQUEST_URI']);

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
