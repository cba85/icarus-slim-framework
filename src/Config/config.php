<?php
namespace Icarus;

use Noodlehaus\Config;

/**
 * Configuration files
 */
class Config {

     /**
     * Configuration files
     *
     * @return void
     */
    public function config() {
        return new Config([
            __DIR__ . '/../config/app.php',
            __DIR__ . '/../config/database.php',
            __DIR__ . '/../config/logger.php',
            __DIR__ . '/../config/view.php',
        ]);
    }
}