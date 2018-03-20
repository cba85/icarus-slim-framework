<?php

use Noodlehaus\Config;

// Configuration
 $container['config'] = function () {
    return new Config([
        __DIR__ . '/../config/app.php'
    ]);
};

// Log (monolog)
$container['logger'] = function ($container) {
    $logger = new Monolog\Logger('Icarus');
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler(__DIR__ . '/../logs/app.log', \Monolog\Logger::DEBUG));
    return $logger;
};