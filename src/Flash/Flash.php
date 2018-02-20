<?php
namespace Icarus;

/**
 * Flash messages
 */
class Flash {

     /**
     * Flash messages
     *
     * @return void
     */
    public function flash() {
        return new \Slim\Flash\Messages();
    }
}