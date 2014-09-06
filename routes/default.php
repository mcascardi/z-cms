<?php

global $router;

$router->connect('/', array('index.php'));
$content = FileUtil::listFiles(realpath(__DIR__.'/../z'));

foreach($content as $file) {
    $name = substr($file, strpos($file, DS.'z'.DS) +3);
    $routePath = substr($name, 0, strlen($name)-4);
    $router->connect($routePath, explode(DS, $name));
}
