<?php
namespace Icarus;

/**
 * CSRF protection
 */
class Csrf {

    /**
     * Load CSRF Protection
     *
     * @return void
     */
    public function invoke()
    {
        return new \Slim\Csrf\Guard;
    }

}