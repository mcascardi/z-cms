<?php
global $router;

$router->connect('/', array('index.php'));

$content = FileUtil::listFiles(realpath(__DIR__.'/../z'));

foreach($content as $file) {
  $name = substr($file, strpos($file, '/z/') +3);
  $router->connect(substr($name, 0, strlen($name)-4), explode('/', $name));
}
