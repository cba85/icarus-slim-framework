<?php

namespace Icarus;

class Session
{

    /**
     * Get session
     *
     * @param string $key
     * @param string $default
     * @return void
     */
    public function get($key, $default = null)
    {
        if ($this->exists($key)) {
            return $_SESSION[$key];
        }
        return $default;
    }

    /**
     * Set sessions
     *
     * @param string $key
     * @param string $value
     * @return void
     */
    public function set($key, $value = null)
    {
        if (is_array($key)) {
            foreach ($key as $sessionKey => $sessionValue) {
                $_SESSION[$sessionKey] = $sessionValue;
            }
            return;
        }
        $_SESSION[$key] = $value;
    }

    /**
     * Session exists
     *
     * @param int $key
     * @return void
     */
    public function exists($key)
    {
        return isset($_SESSION[$key]) and !empty($_SESSION[$key]);
    }

    /**
     * Clear sessions
     *
     * @param int ...$key
     * @return void
     */
    public function clear(...$key)
    {
        foreach ($key as $sessionKey) {
            unset($_SESSION[$sessionKey]);
        }
    }

}