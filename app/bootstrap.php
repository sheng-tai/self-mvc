<?php
// load config
require_once 'config/config.php';

// auto load library
spl_autoload_register(function ($class) {
    require_once 'library/' . $class . '.php';
});

$test = new Core();