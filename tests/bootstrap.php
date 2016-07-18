<?php

require_once __DIR__ . '/../vendor/autoload.php';

// configure environment
Tester\Environment::setup();
date_default_timezone_set('Europe/Prague');

// create temporary directory
define('TEMP_DIR', __DIR__ . '/tmp/' . (isset($_SERVER['argv']) ? md5(serialize($_SERVER['argv'])) : getmypid()));
Tester\Helpers::purge(TEMP_DIR);


$_SERVER = array_intersect_key($_SERVER, array_flip([
    'PHP_SELF',
    'SCRIPT_NAME',
    'SERVER_ADDR',
    'SERVER_SOFTWARE',
    'HTTP_HOST',
    'DOCUMENT_ROOT',
    'OS',
    'argc',
    'argv',
]));
$_SERVER['REQUEST_TIME'] = 1234567890;
$_ENV = $_GET = $_POST = [];
