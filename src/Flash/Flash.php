<?php
namespace Icarus;

/**
 * Flash messages
 */
class Flash {

    /**
     * Load flash messages
     *
     * @return void
     */
    public function invoke()
    {
        return new \Slim\Flash\Messages();
    }

}