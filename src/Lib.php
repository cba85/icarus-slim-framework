<?php

namespace Icarus;

use Noodlehaus\Config;

/**
 * Libraries dependencies
 */
class Lib
{

    /**
     * Config files
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

    /**
     * Flash messages
     *
     * @return void
     */
    public function flash() {
        return new \Slim\Flash\Messages();
    }

    /**
     * CSRF Protection
     *
     * @return void
     */
    public function csrf() {
        return new \Slim\Csrf\Guard;
    }

}