<?php
/**
 * Bootstrap file
 * 
 * Loads the dependencies and sets up classes/objects needed to run
 * the core of the application.
 *
 * PHP Version 5
 *
 * @since 0.1
 */

define('DS', DIRECTORY_SEPARATOR);
include __DIR__ . '/lib/functions.php';
include __DIR__ . '/classes/SplClassLoader.php';
include 'Net/URL/Mapper.php';
$router = Net_URL_Mapper::getInstance();
$classLoader = new SplClassLoader(null, __DIR__ . '/classes');
$classLoader->loadClass('Z');
$classLoader->loadClass('FileUtil');
FileUtil::includeAll('routes');
