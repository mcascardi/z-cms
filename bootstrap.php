<?php

include __DIR__ . '/lib/functions.php';
include __DIR__ . '/classes/SplClassLoader.php';
include 'Net/URL/Mapper.php';
$router = Net_URL_Mapper::getInstance();
$classLoader = new SplClassLoader(null, __DIR__ . '/classes');
$classLoader->loadClass('Z');
$classLoader->loadClass('FileUtil');
FileUtil::includeAll('routes');
